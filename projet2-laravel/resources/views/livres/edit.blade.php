@extends('layouts.app')

@section('title' , 'Modifier Livre')

@section('content')
    <div>
        <form action="{{ route('livres.update' , $livre) }}" methode="POST">
            @method('PUT')
            @csrf

            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" required value="{{ $livre->titre }}">
                @error('titre')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="annee_pub">Annee Publication</label>
                <input type="number" name="annee_pub" required value="{{ $titre->annee_pub }}">
                @error('annee_pub')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="nb_pages">Nombre de pages</label>
                <input type="number" name="nb_pages" required value="{{ $titre->nb_pages }}">
                @error('nb_pages')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="auteur_id">Auteur</label>
                <select name="auteur_id" id="auteur_id">
                    @foreach ($auteurs as $auteur)
                        <option value="{{ $auteur->id }}" {{ $auteur->id == $titre->auteur_id ? 'selected' : '' }}>
                            {{ $auteur->nom }} {{ $auteur->prenom }}
                        </option>
                    @endforeach
                </select>
                @error('titre')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <button type="submit">Modifier</button>
        </form>
    </div>
@endsection