@extends('layouts.app')

@section('title' , 'Liste livres')

@section('content')
    <div>
        @if(session('success'))
            <div>
                <p style="color: green">{{ session('success') }}</p>
            </div>
        @endif
        
        <h2>Liste des livres :</h2>
        <div>
            <form action="{{ route('livres.index') }}" method="GET">
                <input type="number" name="annee_pub" value="{{ request('annee_pub') }}">
                <input type="number" name="nb_pages" value="{{ request('nb_pages') }}">
                <button type="submit">Filtrer</button>
                <a href="{{ route('livres.index') }}">Réinitialiser</a>
            </form>
        </div>
        <div>
            <ul>
                @forelse($livres as $livre)
                    <li> Titre : {{ $livre->titre }} || Annee pub : {{ $livre->annee_pub }}
                         || Nb_pages : {{ $livre->nb_pages }} || Auteur : {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}
                    </li>
                    <div>
                        <a href="{{ route('livres.edit' , $livre) }}">Modifier</a>
                        <a href="{{ route('livres.confirmationDelete' , $livre) }}">Supprimer</a>
                    </div>
                @empty
                    <p>Aucun livre trouvee !</p>
                @endforelse
            </ul>
        </div>
        <div>
            {{ $livres->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection