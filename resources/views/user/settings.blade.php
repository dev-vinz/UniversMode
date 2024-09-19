@extends('layout.app')

@section('content')
    <h1 class="mb-5 text-center">Mes paramètres</h1>

    <ul>
        <li>
            <a href="{{ route('user.informations-form') }}" class="btn btn-outline-secondary">
                Modifier mes informations
            </a>
        </li>
        <li>
            <a href="{{ route('user.password-form') }}" class="btn btn-outline-secondary">Modifier mon mot de passe</a>
        </li>
    </ul>
@endsection
