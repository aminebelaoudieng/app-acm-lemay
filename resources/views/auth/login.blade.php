@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-wrapper">
        <!-- Sélecteur de langue -->
        <div class="language-selector">
            <form id="lang-form" action="" method="get">
                <select class="form-control form-control-sm" onchange="window.location.href='/lang/' + this.value;">
                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                </select>
            </form>
        </div>
        
        <!-- Header avec logo et branding -->
        <div class="login-header">
            <div class="login-logo">
                <img src="{{ asset('images/optimo.png') }}" alt="Optimo Logo" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMzAiIGZpbGw9IiMzNDkwZGMiLz4KPHRleHQgeD0iMzAiIHk9IjM1IiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMjAiIGZvbnQtd2VpZ2h0PSJib2xkIiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+QUNNPC90ZXh0Pgo8L3N2Zz4K'">
            </div>
            <h1 class="brand-title">{{ __('login.comparable_sheets') }}</h1>
            <p class="brand-subtitle">A.C.M. - {{ __('login.market_analysis') }}</p>
        </div>

        <!-- Corps du formulaire -->
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">{{ __('login.email') }}</label>
                    <input id="email" type="email" class="login-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('login.email_placeholder') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('login.password') }}</label>
                    <input id="password" type="password" class="login-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('login.password_placeholder') }}">
                    @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('login.remember') }}
                    </label>
                </div>

                <button type="submit" class="login-btn">
                    {{ __('login.login') }}
                </button>

                @if (Route::has('password.request'))
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">
                        {{ __('login.forgot') }}
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection