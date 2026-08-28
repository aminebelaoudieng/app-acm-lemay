<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css?v=4') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-address-fix.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-modern.css') }}" rel="stylesheet">

    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet" />

    <!-- CSS Moderne et Minimaliste -->
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #fafbfc;
        }
        
        /* Navbar Ultra Moderne */
        .navbar {
            background: #ffffff !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
            border-bottom: 1px solid #e9ecef;
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        
        .navbar-brand {
            color: #212529 !important;
            font-weight: 800;
            font-size: 1.75rem;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #ff0b17, #000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .navbar-brand:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease;
        }
        
        /* Switcher de langue minimaliste */
        .lang-switch {
            position: relative;
            display: inline-flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 4px;
            margin-right: 20px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .lang-option {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.15s ease;
            border: none;
            background: none;
            position: relative;
        }
        
        .lang-option.active {
            background: #ffffff;
            color: #ff0b17;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
        }
        
        .lang-option:not(.active):hover {
            color: #495057;
        }
        
     
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 12px;
            margin-top: 8px;
            min-width: 200px;
            white-space: nowrap;
        }
        
        .dropdown-menu.show {
            display: block !important;
        }
        
        .dropdown-item {
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            transition: all 0.15s ease;
            margin: 2px 0;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .dropdown-item i {
            width: 16px;
            text-align: center;
            margin-right: 8px;
        }
        
        .dropdown-item:hover {
            background: #ff0b17;
            color: white;
            transform: translateX(2px);
        }
        
        /* Main Content */
        main {
            min-height: calc(100vh - 80px);
            background: linear-gradient(135deg, #fafbfc 0%, #f1f3f4 100%);
        }
        
        .container {
            max-width: 1140px;
        }
        
        /* Cards et formulaires modernes */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            background: white;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.2s ease;
            background-color: #ffffff;
            color: #495057;
        }
        
        .form-control:focus {
            border-color: #ff0b17;
            box-shadow: 0 0 0 3px rgba(255, 11, 23, 0.1);
            outline: none;
        }
        
        /* Styles spécifiques pour les select */
        select.form-control {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding: 14px 40px 14px 16px;
            height: auto;
            min-height: 48px;
            line-height: 1.4;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        
        select.form-control:focus {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ff0b17' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        }
        
        /* Style pour les options */
        select.form-control option {
            color: #495057;
            background-color: #ffffff;
            padding: 10px 16px;
            line-height: 1.4;
            font-size: 14px;
        }
        
        select.form-control option:hover,
        select.form-control option:focus {
            background-color: #f8f9fa;
        }
        
        /* Styles spécifiques pour les input file */
        input[type="file"].form-control {
            padding: 16px;
            min-height: 52px;
            line-height: 1.4;
        }
        
        /* Custom file input - même style que form-control */
        .custom-file-wrapper {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 10px;
            transition: all 0.2s ease;
        }
        
        .custom-file-wrapper:hover {
            border-color: #ff0b17 !important;
        }
        
        .custom-file-wrapper:focus {
            border-color: #ff0b17 !important;
            outline: none;
        }
        
        .file-input-content {
            display: flex;
            align-items: center;
            color: #495057;
            font-size: 14px;
            font-weight: 500;
        }
        
        .file-input-content i {
            color: #6c757d;
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.2s ease;
        }
        
        .btn-success {
            background: #ff0b17;
            border-color: #ff0b17;
        }
        
        .btn-success:hover {
            background: #e00a15;
            border-color: #e00a15;
            transform: translateY(-1px);
        }
        
        .btn-outline-secondary {
            border-color: #dee2e6;
            color: #6c757d;
        }
        
        .btn-outline-secondary:hover {
            background: #6c757d;
            border-color: #6c757d;
        }
        
        /* Style spécifique pour le bouton file */
        .btn-file {
            border: 2px solid #ff0b17 !important;
            color: #ff0b17 !important;
            background: #ffffff;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .btn-file:hover {
            background: #ff0b17 !important;
            color: #ffffff !important;
            border-color: #ff0b17 !important;
            transform: translateY(-1px);
        }
        
        .btn-file:focus {
            border-color: #ff0b17 !important;
        }
        
        .file-name {
            color: #6c757d;
            font-size: 14px;
            font-style: italic;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.4rem;
            }
            
            .lang-switch {
                margin-right: 15px;
            }
            
            .lang-option {
                padding: 6px 10px;
                font-size: 12px;
            }
            
      .profil-icon {
        width: 48px;
        height: 48px;
      }
        }
        
        /* Animations subtiles */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .navbar-nav {
            animation: fadeIn 0.5s ease;
        }
        
        /* Navbar toggler moderne */
        .navbar-toggler {
            border: none;
            padding: 4px 8px;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>

    @stack('header-scripts')
</head>
<body>
    <div id="app">
        @unless(request()->routeIs('login') || request()->is('/'))
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item">
                            <div class="lang-switch">
                                <button class="lang-option {{ app()->getLocale() == 'fr' ? 'active' : '' }}" onclick="changeLang('fr')">
                                    FR
                                </button>
                                <button class="lang-option {{ app()->getLocale() == 'en' ? 'active' : '' }}" onclick="changeLang('en')">
                                    EN
                                </button>
                            </div>
                        </li>
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <div class="profile-section">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="profil-icon"
                                         src="{{ isset(Auth::user()->photo) ? asset('uploads/users/'.Auth::user()->photo) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=ff0b17&color=fff&size=512&rounded=true&length=2' }}"
                                         alt="{{ Auth::user()->name }}">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        <i class="fas fa-user mr-2"></i>{{ __('Profile') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endunless

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- jQuery (obligatoire) -->
    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap JS (si non inclus dans app.js) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Chargement et initialisation Summernote avec vérification -->
    <script>
      // Fonction pour charger Summernote de manière asynchrone
      function loadSummernote() {
        console.log('Chargement de Summernote...');

        // Vérifier si Summernote est déjà chargé
        if (typeof $.fn.summernote !== 'undefined') {
          console.log('Summernote déjà disponible');
          initSummernote();
          return;
        }

        // Charger Summernote
        var script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js';
        script.onload = function() {
          console.log('Summernote chargé avec succès');
          initSummernote();
        };
        script.onerror = function() {
          console.error('Erreur lors du chargement de Summernote');
        };
        document.head.appendChild(script);
      }

      // Fonction pour initialiser Summernote
      function initSummernote() {
        console.log('Initialisation de Summernote...');

        // Réduire le délai et ajouter une fonction de réinitialisation pour les nouveaux éléments
        setTimeout(function() {
          initTextareas();

          // Charger app.js après Summernote
          console.log('Chargement de app.js après Summernote...');
          loadAppJs();
        }, 50); // Délai réduit de 200ms à 50ms
      }

      // Fonction séparée pour initialiser les textareas
      function initTextareas() {
        var textareas = $('textarea:not(.note-editable)');
        console.log('Nombre de textarea trouvés:', textareas.length);

        textareas.each(function(index) {
          var $this = $(this);
          console.log('Textarea ' + index + ':', $this.attr('name'));

          try {
            $this.summernote({
              height: 500,
              toolbar: [
                ['history', ['undo', 'redo']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
              ]
            });
            console.log('Summernote initialisé avec succès sur:', $this.attr('name'));
          } catch (e) {
            console.error('Erreur lors de l\'initialisation de Summernote:', e);
          }
        });
      }

      // Fonction pour charger app.js de manière sécurisée
      function loadAppJs() {
        var script = document.createElement('script');
        script.src = '{{ asset("js/app.js") }}';
        script.onload = function() {
          console.log('app.js chargé avec succès');
          // Réinitialiser les fonctionnalités de app.js
          reinitAppJsFeatures();
        };
        script.onerror = function() {
          console.error('Erreur lors du chargement de app.js');
        };
        document.head.appendChild(script);
      }

      // Fonction pour réinitialiser les fonctionnalités de app.js
      function reinitAppJsFeatures() {
        setTimeout(function() {
          console.log('Réinitialisation des fonctionnalités app.js...');

          // Datepicker
          if (typeof $.fn.datepicker !== 'undefined') {
            $(".datepicker").datepicker({
              format: "yyyy-mm-dd",
              autoclose: true,
              todayHighlight: true,
              language: 'fr',
              weekStart: 1,
              todayBtn: "linked"
            });
          }

          // Gestion des onglets
          if (window.location.hash && $('.nav-tabs a[href="' + window.location.hash + '"]').length) {
            $('.nav-tabs a[href="' + window.location.hash + '"]').tab("show");
          } else if ($(".nav-tabs").length && !$(".nav-tabs .nav-link.active").length) {
            $(".nav-tabs .nav-link").eq(0).tab("show");
          }

          // Masques de saisie
          if (typeof $.fn.mask !== 'undefined') {
            $(".money").mask("00 000 000 000", { reverse: true });
            $(".tel").mask("(000) 000-0000");
          }

          // Color picker
          if (typeof $.fn.spectrum !== 'undefined') {
            $("#color-picker").spectrum({
              preferredFormat: "hex",
              showInput: true
            });
          }

          // Boutons de suppression d'image
          $(".delete-img-btn").off('click').on("click", function(e) {
            e.preventDefault();
            $(this).parent().find("img").remove();
            $("#" + $(this).attr("id") + "_old").val("delete");
            $(this).remove();
          });

          // Gestion type copropriété
          if ($("select[name='type_copropriete']").length) {
            $("select[name='type_copropriete']").off('change').on("change", function() {
              if ($(this).val() == "divise") {
                $(".field-evaluation-municipale").removeClass("d-none");
              } else {
                $(".field-evaluation-municipale").addClass("d-none");
              }
            });

            if ($("select[name='type_copropriete']").val() == "indivise") {
              $(".field-evaluation-municipale").addClass("d-none");
            } else {
              $(".field-evaluation-municipale").removeClass("d-none");
            }
          }

          // Réinitialiser les dropdowns Bootstrap (menu profil)
          console.log('Réinitialisation des dropdowns Bootstrap...');
          $('[data-toggle="dropdown"]').dropdown();

          console.log('Toutes les fonctionnalités réinitialisées avec succès');

          // Ajouter un écouteur pour les changements d'onglets
          setupTabListener();
        }, 100); // Délai réduit de 300ms à 100ms
      }

      // Fonction pour écouter les changements d'onglets et réinitialiser Summernote
      function setupTabListener() {
        $('a[data-toggle="pill"], a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          console.log('Changement d\'onglet détecté');
          // Petit délai pour laisser le contenu se charger
          setTimeout(function() {
            initTextareas();
          }, 10); // Délai très court pour une réactivité maximale
        });
      }

      // Fonction simple pour changer de langue
      function changeLang(lang) {
        window.location.href = '/lang/' + lang;
      }

      // Démarrer le processus quand le document est prêt
      $(document).ready(function() {
        console.log('Document ready - initialisation Bootstrap et Summernote');

        // Initialiser immédiatement les dropdowns Bootstrap pour le menu profil
        console.log('Test Bootstrap disponible:', typeof $.fn.dropdown);

        if (typeof $.fn.dropdown !== 'undefined') {
          $('[data-toggle="dropdown"]').dropdown();
          console.log('Dropdowns Bootstrap initialisés');
        } else {
          console.error('Bootstrap dropdown non disponible');
        }

        // Solution alternative : ajouter un gestionnaire de clic manuel
        $('#navbarDropdown').on('click', function(e) {
          e.preventDefault();
          var $menu = $(this).next('.dropdown-menu');
          console.log('Clic sur menu profil, menu trouvé:', $menu.length);

          // Toggle manuel du menu
          if ($menu.hasClass('show')) {
            $menu.removeClass('show');
            console.log('Menu fermé');
          } else {
            $('.dropdown-menu').removeClass('show'); // Fermer autres menus
            $menu.addClass('show');
            console.log('Menu ouvert');
          }
        });

        // Fermer le menu si on clique ailleurs
        $(document).on('click', function(e) {
          if (!$(e.target).closest('.dropdown').length) {
            $('.dropdown-menu').removeClass('show');
          }
        });

        // Démarrer le chargement de Summernote
        loadSummernote();
      });
    </script>

    <!-- Autres scripts -->
<script src="{{ asset('js/form-validation.js') }}"></script>
    @stack('footer-scripts')



</body>
</html>
