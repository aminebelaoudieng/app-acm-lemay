/**
 * Google Places Autocomplete centralisé
 * Utilisé pour l'autocomplétion d'adresses dans les fiches
 */

function initAutocomplete() {
    const input = document.getElementById('googleAutoComplete');
    
    // Vérifier si l'élément existe avant d'initialiser
    if (!input) {
        console.warn('Element with ID "googleAutoComplete" not found');
        return;
    }

    const autocomplete = new google.maps.places.Autocomplete(input, {
        types: ['geocode'],
        componentRestrictions: { country: 'ca' }
    });

    autocomplete.setFields(['address_component', 'geometry']);

    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();

        // Coordonnées GPS
        if (place.geometry) {
            const lat = place.geometry.location.lat();
            const lng = place.geometry.location.lng();
            
            // Mettre à jour les champs de coordonnées s'ils existent
            updateFieldIfExists('map_lat', lat);
            updateFieldIfExists('map_lng', lng);
            updateFieldIfExists('street_lat', lat);
            updateFieldIfExists('street_lng', lng);
            updateFieldIfExists('map_zoom', 14);
            updateFieldIfExists('street_zoom', 1);
            updateFieldIfExists('street_heading', 0);
            updateFieldIfExists('street_pitch', 0);
        }

        // Mapping des composants d'adresse
        const components = {
            street_number: 'street_number',
            route: 'route',
            locality: 'locality',
            administrative_area_level_1: 'administrative_area_level_1',
            postal_code: 'postal_code'
        };

        // Vider les champs existants
        for (const component in components) {
            const field = document.getElementById(components[component]);
            if (field) field.value = '';
        }

        // Remplir les champs avec les nouvelles données
        place.address_components.forEach(function (component) {
            const types = component.types;
            for (const type in components) {
                if (types.indexOf(type) > -1) {
                    const field = document.getElementById(components[type]);
                    if (field) field.value = component.long_name;
                }
            }
        });
    });
}

/**
 * Fonction utilitaire pour mettre à jour un champ s'il existe
 */
function updateFieldIfExists(fieldId, value) {
    const field = document.getElementById(fieldId);
    if (field) {
        field.value = value;
    }
}

/**
 * Améliorer les champs de date pour respecter le format YYYY-MM-DD
 */
function enhanceDateFields() {
    const dateFields = document.querySelectorAll('.datepicker');

    dateFields.forEach(function(field) {
        // Ajouter un événement pour valider le format lors de la saisie
        field.addEventListener('blur', function() {
            const value = this.value.trim();
            if (value && !isValidDateFormat(value)) {
                // Afficher un message d'aide
                showDateFormatHelper(this);
            } else {
                // Supprimer le message d'aide s'il existe
                removeDateFormatHelper(this);
            }
        });

        // Ajouter un pattern HTML5 pour la validation
        field.setAttribute('pattern', '\\d{4}-\\d{1,2}-\\d{1,2}');
        field.setAttribute('title', 'Format requis: YYYY-MM-DD ou YYYY-M-D (ex: 2024-03-15 ou 2024-3-5)');
    });
}

/**
 * Vérifier si la date respecte le format YYYY-MM-DD (avec ou sans zéros de remplissage)
 */
function isValidDateFormat(dateString) {
    // Accepter YYYY-MM-DD ou YYYY-M-D (avec ou sans zéros de remplissage)
    const regex = /^\d{4}-\d{1,2}-\d{1,2}$/;
    if (!regex.test(dateString)) return false;

    // Vérifier si c'est une date valide
    const date = new Date(dateString);
    if (!(date instanceof Date) || isNaN(date)) return false;

    // Extraire les parties de la date
    const parts = dateString.split('-');
    const year = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10);
    const day = parseInt(parts[2], 10);

    // Vérifier que la date correspond aux valeurs saisies
    return date.getFullYear() === year &&
           date.getMonth() === month - 1 &&
           date.getDate() === day;
}

/**
 * Afficher un message d'aide pour le format de date
 */
function showDateFormatHelper(field) {
    removeDateFormatHelper(field); // Supprimer l'ancien message

    const helpDiv = document.createElement('div');
    helpDiv.className = 'date-format-helper text-danger small mt-1';
    helpDiv.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Format requis: YYYY-MM-DD ou YYYY-M-D (ex: 2024-03-15 ou 2024-3-5)';

    field.parentNode.appendChild(helpDiv);
}

/**
 * Supprimer le message d'aide pour le format de date
 */
function removeDateFormatHelper(field) {
    const existingHelper = field.parentNode.querySelector('.date-format-helper');
    if (existingHelper) {
        existingHelper.remove();
    }
}

/**
 * Gérer la préservation des onglets actifs lors de la soumission de formulaires
 */
function handleTabPreservation() {
    // Gérer tous les formulaires qui doivent préserver les onglets
    const formsToHandle = document.querySelectorAll('form[data-form-type="master-form"], form[data-preserve-tabs="true"]');

    formsToHandle.forEach(function(form) {
        form.addEventListener('submit', function() {
            // Récupérer l'onglet principal actif
            const activeMainTab = document.querySelector('#myTab .nav-link.active');
            const activeSubTab = document.querySelector('#v-pills-tab .nav-link.active');

            // Ajouter des champs cachés pour préserver les onglets
            if (activeMainTab) {
                const mainTabValue = activeMainTab.getAttribute('href').replace('#', '');
                addHiddenField(this, 'active_main_tab', mainTabValue);
            }

            if (activeSubTab) {
                const subTabValue = activeSubTab.getAttribute('href').replace('#', '');
                addHiddenField(this, 'active_sub_tab', subTabValue);
            }
        });
    });
}

/**
 * Ajouter un champ caché au formulaire
 */
function addHiddenField(form, name, value) {
    // Vérifier si le champ existe déjà
    const existingField = form.querySelector('input[name="' + name + '"]');
    if (existingField) {
        existingField.value = value;
        return;
    }

    // Créer un nouveau champ caché
    const hiddenField = document.createElement('input');
    hiddenField.type = 'hidden';
    hiddenField.name = name;
    hiddenField.value = value;
    form.appendChild(hiddenField);
}

/**
 * Gérer l'aperçu des images uploadées
 */
function handleImagePreview() {
    const photoCustomInput = document.getElementById('photo_custom');

    if (photoCustomInput) {
        photoCustomInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('imgStreet');
                if (preview) {
                    preview.src = e.target.result;
                }
            };

            reader.readAsDataURL(file);
        });
    }
}

// Initialiser toutes les fonctionnalités quand le DOM est prêt
document.addEventListener("DOMContentLoaded", function() {
    initAutocomplete();
    enhanceDateFields();
    handleTabPreservation();
    handleImagePreview();
});
