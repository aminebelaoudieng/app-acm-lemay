/**
 * Validation globale des formulaires
 * Ce script vérifie les champs obligatoires avant la soumission des formulaires
 */

// Configuration des champs obligatoires par type de formulaire
const requiredFieldsByFormType = {
    // Fiche principale (Master)
    'master-form': [
        'adresse',
        'caracteristique_superficie_habitable',
        'evaluation_terrain',
        'evaluation_batiment',
        'date',
        'but',
        'periode'
    ],
    // Fiche Vigueur
    'vigueur-form': [
        'adresse',
        'ville',
        'province',
        'numero_civic',
        'rue',
        'code_postal',
        'comparable_vigueur_prix_demande',
        'comparable_vigueur_date_vente',
        'caracteristique_annee_construction',
        'caracteristique_superficie_habitable',
        'caracteristique_etage'
    ],
    // Fiche Vendu
    'vendu-form': [
        'adresse',
        'ville',
        'province',
        'numero_civic',
        'rue',
        'code_postal',
        'comparable_vendu_prix_demande',
        'comparable_vendu_prix_vente',
        'comparable_vendu_date_vente',
        'comparable_vendu_delais_vente',
        'caracteristique_annee_construction',
        'caracteristique_superficie_habitable',
        'caracteristique_etage'
    ],
    // Annexe
    'annexe-form': [
        'name',
        'file'
    ]
};

// Noms lisibles pour les champs (pour l'affichage dans le modal)
const fieldLabels = {
    'adresse': 'Adresse complète',
    'caracteristique_superficie_habitable': 'Superficie habitable',
    'evaluation_terrain': 'Évaluation du terrain',
    'evaluation_batiment': 'Évaluation du bâtiment',
    'date': 'Date',
    'but': 'But de l\'analyse',
    'periode': 'Période',
    'ville': 'Ville',
    'province': 'Province',
    'numero_civic': 'Numéro civique',
    'rue': 'Rue',
    'code_postal': 'Code postal',
    'comparable_vigueur_prix_demande': 'Prix demandé',
    'comparable_vigueur_date_vente': 'Date de mise en vente',
    'caracteristique_annee_construction': 'Année de construction',
    'caracteristique_etage': 'Étage',
    'comparable_vendu_prix_demande': 'Prix demandé',
    'comparable_vendu_prix_vente': 'Prix de vente',
    'comparable_vendu_date_vente': 'Date de vente',
    'comparable_vendu_delais_vente': 'Délai de vente',
    'name': 'Nom de l\'annexe',
    'file': 'Fichier'
};

// Créer le modal de validation s'il n'existe pas déjà
function createValidationModal() {
    if (document.getElementById('validationModal')) {
        return;
    }

    const modalHTML = `
        <div id="validationModal" class="modal-validation">
            <div class="modal-validation-content">
                <div class="modal-validation-header">
                    <h5 class="modal-validation-title">Champs obligatoires manquants</h5>
                    <button type="button" class="modal-validation-close" onclick="closeValidationModal()">&times;</button>
                </div>
                <div class="modal-validation-body">
                    <p>Veuillez remplir les champs obligatoires suivants :</p>
                    <ul id="missingFieldsList" class="missing-fields-list">
                        <!-- Liste des champs manquants générée dynamiquement -->
                    </ul>
                </div>
                <div class="modal-validation-footer">
                    <button type="button" class="btn btn-primary" onclick="closeValidationModal()">Compris</button>
                </div>
            </div>
        </div>
    `;

    // Ajouter le modal au body
    const modalContainer = document.createElement('div');
    modalContainer.innerHTML = modalHTML;
    document.body.appendChild(modalContainer.firstElementChild);

    // Ajouter les styles CSS
    const styleElement = document.createElement('style');
    styleElement.textContent = `
        .required-field-error {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
        }
        
        .modal-validation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }
        
        .modal-validation.show {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-validation-content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            padding: 30px;
            transform: translateY(-20px);
            transition: transform 0.3s;
        }
        
        .modal-validation.show .modal-validation-content {
            transform: translateY(0);
        }
        
        .modal-validation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .modal-validation-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #dc3545;
            margin: 0;
        }
        
        .modal-validation-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6c757d;
        }
        
        .modal-validation-body {
            margin-bottom: 20px;
        }
        
        .modal-validation-footer {
            display: flex;
            justify-content: flex-end;
        }
        
        .missing-fields-list {
            list-style-type: none;
            padding-left: 0;
        }
        
        .missing-fields-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .missing-fields-list li:last-child {
            border-bottom: none;
        }
        
        .missing-fields-list li::before {
            content: "•";
            color: #dc3545;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    `;
    document.head.appendChild(styleElement);
}

// Déterminer le type de formulaire
function getFormType(form) {
    // Vérifier si le formulaire a un attribut data-form-type
    if (form.dataset.formType) {
        return form.dataset.formType;
    }
    
    // Sinon, essayer de déterminer le type en fonction des champs présents
    if (form.querySelector('[name="comparable_vendu_prix_vente"]')) {
        return 'vendu-form';
    } else if (form.querySelector('[name="comparable_vigueur_prix_demande"]')) {
        return 'vigueur-form';
    } else if (form.querySelector('[name="file"]') && form.querySelector('[name="name"]')) {
        return 'annexe-form';
    } else {
        return 'master-form';
    }
}

// Valider le formulaire
function validateForm(form) {
    const formType = getFormType(form);
    const requiredFields = requiredFieldsByFormType[formType] || [];
    const missingFields = [];
    
    // Réinitialiser les styles d'erreur
    form.querySelectorAll('.required-field-error').forEach(field => {
        field.classList.remove('required-field-error');
    });
    
    // Vérifier chaque champ requis
    requiredFields.forEach(fieldName => {
        const field = form.querySelector(`[name="${fieldName}"]`);
        if (field && !field.value.trim()) {
            field.classList.add('required-field-error');
            
            // Obtenir le label lisible pour ce champ
            const fieldLabel = fieldLabels[fieldName] || fieldName.replace(/_/g, ' ').replace(/([A-Z])/g, ' $1').trim();
            missingFields.push(fieldLabel);
        }
    });
    
    // Si des champs sont manquants, afficher le modal
    if (missingFields.length > 0) {
        showValidationModal(missingFields);
        return false;
    }
    
    return true;
}

// Afficher le modal de validation
function showValidationModal(missingFields) {
    createValidationModal();
    
    const modal = document.getElementById('validationModal');
    const missingFieldsList = document.getElementById('missingFieldsList');
    
    // Vider la liste existante
    missingFieldsList.innerHTML = '';
    
    // Ajouter chaque champ manquant à la liste
    missingFields.forEach(field => {
        const li = document.createElement('li');
        li.textContent = field;
        missingFieldsList.appendChild(li);
    });
    
    // Afficher le modal
    modal.classList.add('show');
    
    // Empêcher le défilement de la page
    document.body.style.overflow = 'hidden';
}

// Fermer le modal de validation
function closeValidationModal() {
    const modal = document.getElementById('validationModal');
    modal.classList.remove('show');
    
    // Réactiver le défilement de la page
    document.body.style.overflow = '';
    
    // Focus sur le premier champ manquant
    const firstErrorField = document.querySelector('.required-field-error');
    if (firstErrorField) {
        firstErrorField.focus();
        
        // Faire défiler jusqu'au champ
        const tabPane = firstErrorField.closest('.tab-pane');
        if (tabPane) {
            const tabId = tabPane.id;
            const tabLink = document.querySelector(`a[href="#${tabId}"]`);
            if (tabLink) {
                tabLink.click();
            }
        }
    }
}

// Initialiser la validation des formulaires
document.addEventListener('DOMContentLoaded', function() {
    // Créer le modal de validation
    createValidationModal();
    
    // Ajouter la fonction closeValidationModal à window pour qu'elle soit accessible depuis le HTML
    window.closeValidationModal = closeValidationModal;
    
    // Intercepter la soumission des formulaires
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!validateForm(this)) {
                event.preventDefault();
                event.stopPropagation();
            }
        });
    });
});