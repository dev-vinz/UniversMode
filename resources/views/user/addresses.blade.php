@extends('layout.app')

@section('content')
    <h1 class="mb-3 text-center">Mes adresses</h1>
    <div class="mb-5 text-center">
        <a href="{{ route('user.create-address') }}" class="btn btn-outline-primary">Ajouter une adresse</a>
    </div>
    <ul>
        @foreach ($addresses as $a)
            <li>
                {{ $a->street }} {{ $a->number }}, {{ $a->npa }} {{ $a->city }}
                <a
                    class="btn btn-sm btn-outline-secondary"
                    href="{{ route('user.edit-address', ['addressId' => $a->id]) }}"
                >
                    Modifier
                </a>
                <form
                    class="d-inline"
                    action="{{ route('user.delete-address', ['addressId' => $a->id]) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
