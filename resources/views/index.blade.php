@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endpush

@section('content')
    <div class="um-banner">
        <h3>15% de réduction sur votre première commande avec le code "Bienvenue"</h3>
    </div>

    <h1 class="text-center">Bienvenue, et bonne navigation !</h1>

    <div class="text-center">
        <img src="{{ asset('img/sarah_dos.webp') }}" alt="Welcome" class="img-fluid" />
    </div>

    <div class="um-banner">
        <h3 class="h4">
            Parcourez mon site et contactez-moi si vous avez besoin de retouche, envie d'une création personnelle, des
            questions ou des commentaires.
        </h3>
    </div>
@endsection
