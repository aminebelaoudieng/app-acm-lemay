@push('header-scripts')
<!-- Croppie CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
@endpush

@push('footer-scripts')
<!-- Croppie JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<style>
    #choose_image_file {
        border: 2px dashed #ff0b17 !important;
        background: #fff !important;
        color: #ff0b17 !important;
        transition: all 0.3s ease !important;
    }
    #choose_image_file:hover {
        border-color: #000 !important;
        color: #000 !important;
        background: #f5f5f5 !important;
    }

    #upload-progress {
        visibility: visible !important;
    }
    .alert-info {
        background-color: #fff3cd !important;
        border-color: #ff0b17 !important;
        color: #856404 !important;
    }
    .alert-success {
        background-color: #d4edda !important;
        border-color: #28a745 !important;
        color: #155724 !important;
    }
    .alert-danger {
        background-color: #f8d7da !important;
        border-color: #ff0b17 !important;
        color: #721c24 !important;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        // Supprimer le test automatique de la barre
        // Afficher les infos seulement après clic
        $("#choose_image_file").click(function() {
            // Afficher les infos au premier clic
            if ($('#upload-info').is(':hidden')) {
                $('#upload-info').fadeIn();
            }
            $("#image_file").trigger('click');
        });
        
        // Configuration CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Vérifier le token CSRF
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        if (!csrfToken) {
            alert('{{ __("profile.csrf_error") }}');
            return;
        }
        
        // Initialiser Croppie après chargement
        var resize;
        setTimeout(function() {
            resize = $('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle'
                },
                url: "{{ $photo }}?v=" + Date.now(),
                boundary: {
                    width: 200,
                    height: 200
                }
            });
        }, 500);
        
        $('#image_file').on('change', function() {
            // Validation du fichier
            var file = this.files[0];
            if (!file) return;
            
            // Validation du type de fichier
            var allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                $('#error-message').text('{{ __("profile.unsupported_file_format") }}');
                $('#upload-error').show();
                return;
            }
            
            // Validation de la taille (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                $('#error-message').text('{{ __("profile.file_too_large") }}');
                $('#upload-error').show();
                return;
            }
            
            // Cacher les messages précédents
            $('#upload-error, #upload-success, #upload-info').hide();
            
            var reader = new FileReader();
            reader.onload = function(e) {
                if (resize) {
                    resize.croppie('bind', {
                        url: e.target.result
                    }).then(function() {
                        $(".upload-image").removeClass("d-none");
                        $('#button-text').text('{{ __("profile.change_photo") }}');
                        $('#choose_image_file').css({
                            'border-color': '#000',
                            'color': '#000',
                            'background': '#f5f5f5'
                        });
                        
                        // Si on est sur une page de création, traiter automatiquement l'image
                        if (window.location.href.includes('/create')) {
                            // Automatiquement cropper et préparer l'image pour le formulaire
                            setTimeout(function() {
                                resize.croppie('result', {
                                    type: 'canvas',
                                    size: 'viewport',
                                    size: {
                                        width: 600,
                                        height: 600
                                    }
                                }).then(function(img) {
                                    // Créer un input hidden avec l'image encodée pour le formulaire
                                    var existingInput = $('input[name="photo_data"]');
                                    if (existingInput.length) {
                                        existingInput.val(img);
                                    } else {
                                        $('<input>').attr({
                                            type: 'hidden',
                                            name: 'photo_data',
                                            value: img
                                        }).appendTo('form');
                                    }
                                    
                                    $('#success-message').text('{{ __("profile.image_upload_success") }}');
                                    $("#upload-success").fadeIn();
                                });
                            }, 500);
                        }
                    }).catch(function(err) {
                        $('#error-message').text('Erreur lors du traitement de l\'image.');
                        $('#upload-error').show();
                    });
                } else {
                    $('#error-message').text('Erreur: Module de recadrage non initialisé.');
                    $('#upload-error').show();
                }
            };
            
            reader.onerror = function() {
                $('#error-message').text('Erreur lors de la lecture du fichier.');
                $('#upload-error').show();
            };
            
            reader.readAsDataURL(file);
        });
        $('.upload-image').on('click', function(ev) {
            ev.preventDefault();
            
            // Cacher les messages précédents
            $('#upload-error, #upload-success').fadeOut();
            
            // Désactiver le bouton
            $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i>{{ __("profile.saving") }}...');

            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport',
                size: {
                    width: 600,
                    height: 600
                }
            }).then(function(img) {
                
                data = {
                    image: img,
                    _token: $('meta[name="csrf-token"]').attr('content')
                };
                $(".profil-icon").attr("src", img)
                if ($("#user_id")) {
                    data.user_id = $("#user_id").val();
                }

                $.ajax({
                    url: "{{route('croppie.upload-image')}}",
                    type: "POST",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        return xhr;
                    },
                    success: function(data) {
                        if(data.file) {
                            $('#success-message').text('{{ __("profile.photo_updated_success") }}');
                            $("#upload-success").fadeIn();
                            $("input[name='photo']").val(data.file);
                        } else {
                            $('#error-message').text('{{ __("profile.photo_save_error") }}');
                            $('#upload-error').fadeIn();
                        }
                        
                        $('.upload-image').prop('disabled', false).html('<i class="fas fa-save mr-2"></i>{{ __("profile.update_photo") }}');
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', xhr.status, xhr.responseText);
                        
                        var errorMessage = '{{ __("profile.upload_technical_error") }}';
                        if (xhr.status === 419) {
                            errorMessage = '{{ __("profile.session_expired") }}';
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.status === 413) {
                            errorMessage = '{{ __("profile.file_too_large_server") }}';
                        } else if (xhr.status === 422) {
                            errorMessage = '{{ __("profile.invalid_file_format") }}';
                        }
                        
                        $('#error-message').text(errorMessage);
                        $('#upload-error').fadeIn();
                        $('.upload-image').prop('disabled', false).html('<i class="fas fa-save mr-2"></i>{{ __("profile.update_photo") }}');
                    }
                });
            });
        });
    });
</script>

@endpush

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{ __('profile.profile_photo') }}</strong>
        
        <div class="row">
            <div class="col-md-5 text-center">
                <div id="upload-demo"></div>
            </div>
            <div class="col-md-7">
                <button type="button" class="btn btn-outline-primary btn-lg btn-block d-flex align-items-center justify-content-center" id="choose_image_file">
                    <i class="fas fa-cloud-upload-alt mr-2"></i>
                    <span id="button-text">{{ __('profile.choose_photo') }}</span>
                </button>
                <input type="file" id="image_file" class="d-none" accept="image/*">
                
                @if(Auth::user()->is_admin)
                <input type="hidden" id="user_id" name="user_id" value="{{ (isset($user)) ? $user->id : $nextId }}">
                @endif
                @if($photo && $photo!="")
                <input type="hidden" name="photo" value="{{ explode('/',$photo)[5] }}">
                @endif
                
                <button class="btn btn-success btn-block upload-image @if($photo=='') d-none @endif mt-3" style="margin-top:2%; @if(request()->is('*/create')) display: none !important; @endif">
                    <i class="fas fa-save mr-2"></i>{{ __('profile.update_photo') }}
                </button>
                
                <!-- Messages de notification -->
                <div class="alert alert-success mt-3" id="upload-success" style="display: none;">
                    <i class="fas fa-check-circle mr-2"></i><span id="success-message"></span>
                </div>
                <div class="alert alert-danger mt-3" id="upload-error" style="display: none;">
                    <i class="fas fa-exclamation-triangle mr-2"></i><span id="error-message"></span>
                </div>
                <div class="alert alert-info mt-3" id="upload-info" style="display: none;">
                    <i class="fas fa-info-circle mr-2"></i>{{ __('profile.photo_formats_info') }}
                </div>
            </div>
        </div>
    </div>
</div>