@extends('layouts.app')

@section('title' , 'Ajouter Livre')

@section('content')
    <div>
        <form action="{{ route('livres.store') }}" method="POST">
            @csrf
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" required value="{{ old('titre') }}">
                @error('titre')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="annee_pub">Annee Publication</label>
                <input type="number" name="annee_pub" required value="{{ old('annee_pub') }}">
                @error('annee_pub')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="nb_pages">Nombre de pages</label>
                <input type="number" name="nb_pages" required value="{{ old('nb_pages') }}">
                @error('nb_pages')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="auteur_id">Auteur</label>
                <select name="auteur_id" id="auteur_id">
                    @foreach ($auteurs as $auteur)
                        <option value="{{ $auteur->id }}" {{ $auteur->id == old('auteur_id') ? 'selected' : '' }}>
                            {{ $auteur->nom }} {{ $auteur->prenom }}
                        </option>
                    @endforeach
                </select>
                @error('titre')
                    <p style="color: red"> {{ $message }} </p>
                @enderror
            </div>
            <button type="submit">Ajouter</button>
        </form>
    </div>
@endsection