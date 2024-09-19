@extends('layout.app')

@push('styles')
    <style>
        form {
            max-width: var(--bs-breakpoint-md);
        }
    </style>
@endpush

@section('content')
    <h1 class="mb-5 text-center">
        @if ($isEdit)
            Modifier mon adresse
        @else
            Créer une adresse
        @endif
    </h1>

    <div class="d-flex justify-content-center">
        <form
            class="needs-validation"
            action="{{
                isset($isEdit) && $isEdit
                    ? route('user.update-address', ['addressId' => $address->id])
                    : route('user.store-address')
            }}"
            method="POST"
            novalidate
        >
            @csrf

            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="street" class="form-label">Rue</label>
                    <input
                        id="street"
                        name="street"
                        type="text"
                        class="form-control"
                        value="{{ old('street') ?? ($address->street ?? '') }}"
                        required
                    />
                    <div class="invalid-feedback">Veuillez renseigner votre rue.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="number" class="form-label">Numéro</label>
                    <input
                        id="number"
                        name="number"
                        type="text"
                        class="form-control"
                        value="{{ old('number') ?? ($address->number ?? '') }}"
                        required
                    />
                    <div class="invalid-feedback">Veuillez renseigner votre numéro de rue.</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="npa" class="form-label">Code postal</label>
                    <input
                        id="npa"
                        name="npa"
                        type="text"
                        class="form-control"
                        value="{{ old('npa') ?? ($address->npa ?? '') }}"
                        required
                    />
                    <div class="invalid-feedback">Veuillez renseigner votre code postal.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="city" class="form-label">Ville</label>
                    <input
                        id="city"
                        name="city"
                        type="text"
                        class="form-control"
                        value="{{ old('city') ?? ($address->city ?? '') }}"
                        required
                    />
                    <div class="invalid-feedback">Veuillez renseigner votre ville.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="country" class="form-label">Pays</label>
                    <input id="country" name="country" type="text" class="form-control" value="Switzerland" required />
                    <div class="invalid-feedback">Veuillez renseigner votre pays.</div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <button type="submit" class="btn btn-outline-primary w-100">
                        @if ($isEdit)
                            Enregistrer
                        @else
                            Créer
                        @endif
                        l'adresse
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/form-validation.js') }}"></script>
@endpush
