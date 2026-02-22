@extends('layouts.app')

@section('title' , 'Liste livres')

@section('content')
    <div>
        @if(session('success'))
        <h2>Liste des livres :</h2>
        <div>
            <ul>
                @forelse($livres as $livre)
                    <li> Titre : {{ $livre->titre }} || Annee pub : {{ $livre->annee_pub }}
                         || Nb_pages : {{ $livre->nb_pages }} || Auteur : {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}
                    </li>
                @empty
                    <p>Aucun livre trouvee !</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection