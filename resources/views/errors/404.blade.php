@extends('layout.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col col-md-7 col-lg-6 mb-3">
            <div class="d-flex flex-column gap-3">
                <h1>Désolé !</h1>
                <h3>La page que vous recherchez n'existe pas.</h3>
                <p>Vous avez peut-être mal saisi l'adresse ou la page a été déplacée.</p>
                <a href="{{ route('index') }}" class="btn btn-outline-primary" style="width: fit-content">
                    <i class="bi bi-house me-2"></i>
                    Retour à l'accueil
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 text-center">
            <img src="{{ asset('img/404.png') }}" alt="404" class="img-fluid" />
        </div>
    </div>
@endsection
