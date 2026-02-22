@extends('layouts.app')

@section('title' , 'Liste livres')

@section('content')
    <div>
        @if(session('success'))
            <div>
                <p style="color: green">{{ session('seccess') }}</p>
            </div>
        @endif
        
        <h2>Liste des livres :</h2>
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