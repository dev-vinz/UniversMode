@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
@endpush

@section('content')
    <div class="um-login-container">
        <div class="mb-3 text-center">
            <a href="{{ route('index') }}" style="outline-offset: 50px">
                <img src="{{ asset('img/logo.png') }}" alt="Logo UniversMode" />
            </a>
        </div>

        <form class="um-card" action="{{ route('auth.authenticate') }}" method="POST">
            @csrf

            <h1 class="h2 mb-5 text-center">Connexion</h1>

            @if (session('status'))
                <div class="alert alert-success mb-5">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger mb-5">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <div class="row">
                <div class="col mb-5">
                    <div class="um-input-box">
                        <i class="bi bi-envelope-at-fill"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder=" "
                            value="{{ old('email') }}"
                            required
                        />
                        <label for="email">Adresse mail</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-4">
                    <div class="um-input-box">
                        <i class="bi bi-shield-lock-fill"></i>
                        <input type="password" id="password" name="password" placeholder=" " required />
                        <label for="password">Mot de passe</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-4">
                    <div class="form-check">
                        <input id="remember-me" name="remember" type="checkbox" class="form-check-input" />
                        <label for="remember-me" class="form-check-label">Se souvenir de moi</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-4">
                    <div class="text-center">
                        <a class="um-forgot" href="{{ route('auth.forgot-password') }}">Mot de passe oublié</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <button type="submit">Connexion</button>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <div class="um-separator">OU</div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="um-register" href="{{ route('auth.register') }}">
                        <span>Créer un compte</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
