@extends('layout.app')

@push('styles')
    <style>
        form {
            max-width: var(--bs-breakpoint-xs);
        }
    </style>
@endpush

@section('content')
    <h1 class="mb-5 text-center">Réinitialisation du mot de passe</h1>

    <div class="d-flex justify-content-center">
        <form class="needs-validation" action="{{ route('auth.send-password-reset-link') }}" method="POST" novalidate>
            @csrf

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <div class="row">
                <div class="col mb-3">
                    <label for="email" class="form-label">Adresse mail</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-at-fill"></i>
                        </span>
                        <input id="email" name="email" type="email" class="form-control" required />
                        <div class="invalid-feedback">Veuillez renseigner une adresse mail valide.</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <button type="submit" class="btn btn-outline-primary w-100">Mot de passe oublié</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/form-validation.js') }}"></script>
@endpush
