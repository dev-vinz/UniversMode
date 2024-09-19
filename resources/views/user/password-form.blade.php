@extends('layout.app')

@push('styles')
    <style>
        form {
            max-width: var(--bs-breakpoint-md);
        }
    </style>
@endpush

@section('content')
    <h1 class="mb-5 text-center">Modifier mon mot de passe</h1>

    <div class="d-flex justify-content-center">
        <form class="needs-validation" action="{{ route('user.update-password') }}" method="POST" novalidate>
            @csrf

            @method('PUT')

            @if ($errors->has('password.confirmed'))
                <div class="alert alert-danger">
                    {{ $errors->first('password.confirmed') }}
                </div>
            @endif

            @if ($errors->has('current_password'))
                <div class="alert alert-danger">
                    {{ $errors->first('current_password') }}
                </div>
            @endif

            <div class="row">
                <div class="col mb-3">
                    <label for="current_password" class="form-label">Mot de passe actuel</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <input
                            id="current_password"
                            name="current_password"
                            type="password"
                            class="form-control"
                            required
                        />
                        <div class="invalid-feedback">Veuillez confirmer votre mot de passe.</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <input id="password" name="password" type="password" class="form-control" required />
                        <div class="invalid-feedback">Veuillez renseigner un mot de passe.</div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmation du nouveau mot de passe</label>
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
                    <button type="submit" class="btn btn-outline-primary w-100">Modifier</button>
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
