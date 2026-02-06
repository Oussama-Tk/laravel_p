@extends('layouts.app')

@section('content')

    <div class="container">
        <h1> Test de l'Api Auth Laravel</h1>
        <ul>
            <li>
                Auth::check() :
                <strong>{{ Auth::check() ? 'Connecté' : 'Non connecté' }}</strong>
            </li>

            <li>
                Auth::id() :
                <strong>{{ Auth::id() ?? 'Aucun' }}</strong>
            </li>
            
            <li>
                Auth::user() :
                <pre>{{ print_r(Auth::user(), true) }}</pre>
            </li>
        </ul>

        @auth
            <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>   
        @endauth
    </div>

@endsection