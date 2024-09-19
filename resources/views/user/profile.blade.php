@extends('layout.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (! $user->email_verified_at)
        <div class="alert alert-primary">
            <p>Votre adresse email n'a pas encore été vérifiée.</p>

            <form action="{{ route('auth.send-email-verification-link') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-primary">Renvoyer l'email de vérification</button>
            </form>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6 d-flex align-items-center mb-3 gap-3">
            <div class="um-img-box">
                <img src="{{ asset('img/user.svg') }}" alt="User Image" style="width: 72px" />
            </div>
            <span class="h5 m-0">{{ $user->firstName }} {{ $user->lastName }}</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6 mb-3">
            <p>
                Bienvenue sur votre tableau de bord,
                <b>{{ $user->firstName }}</b>
                !
            </p>
            <p>Vous pouvez voir vos commandes, adresses et paramètres en cliquant sur les onglets ci-dessous.</p>
        </div>
    </div>

    <ul>
        {{--
            TODO: Uncomment this list item when the user orders page is ready.
            <li>
            <a href="{{ route('user.orders') }}" class="btn btn-outline-primary">Mes commandes</a>
            </li>
        --}}
        <li>
            <a href="{{ route('user.addresses') }}" class="btn btn-outline-primary">Mes adresses</a>
        </li>
        <li>
            <a href="{{ route('user.settings') }}" class="btn btn-outline-primary">Mes paramètres</a>
        </li>
    </ul>
@endsection
