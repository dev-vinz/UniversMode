@extends('layout.app')

@push('styles')
    <style>
        form {
            max-width: var(--bs-breakpoint-md);
        }
    </style>
@endpush

@section('content')
    <h1 class="mb-5 text-center">Créer un compte</h1>

    <div class="d-flex justify-content-center">
        <form class="needs-validation" action="{{ route('auth.store') }}" method="POST" novalidate>
            @csrf

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">Prénom</label>
                    <input
                        id="first_name"
                        name="first_name"
                        type="text"
                        class="form-control"
                        value="{{ old('first_name') }}"
                        required
                    />
                    <div class="invalid-feedback">Veuillez renseigner votre prénom.</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Nom</label>
                    <input
                        id="last_name"
                        name="last_name"
                        type="text"
                        class="form-control"
                        value="{{ old('last_name') }}"
                        required
                    />
                    <div class="invalid-feedback">Veuillez renseigner votre nom.</div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="email" class="form-label">Adresse mail</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-at-fill"></i>
                        </span>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        />
                        <div class="invalid-feedback">Veuillez renseigner une adresse mail valide.</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <input id="password" name="password" type="password" class="form-control" required />
                        <div class="invalid-feedback">Veuillez renseigner un mot de passe.</div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="form-control"
                            required
                        />
                        <div class="invalid-feedback">Veuillez confirmer votre mot de passe.</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <button type="submit" class="btn btn-outline-primary w-100">Créer un compte</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/form-validation.js') }}"></script>

    <script type="text/javascript">
        const password = document.getElementById('password');
        const password_confirmation = document.getElementById('password_confirmation');

        password.addEventListener('input', () => {
            password_confirmation.setCustomValidity(
                password_confirmation.value !== password.value ? 'Les mots de passe ne correspondent pas.' : '',
            );
        });

        password_confirmation.addEventListener('input', () => {
            password_confirmation.setCustomValidity(
                password_confirmation.value !== password.value ? 'Les mots de passe ne correspondent pas.' : '',
            );
        });
    </script>
@endpush
