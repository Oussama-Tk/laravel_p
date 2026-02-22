@extends('layouts.app')

@section('title' , 'Liste livres')

@section('content')
    <div>
        <form action="{{ route('livres.destroy' , $livre) }}" method="POST">
            @method('DELETE')
            @csrf
            
            <p>veuillez-vous vraiment supprimer ce livre : {{ $livre->titre }} ?</p>
            <button type="submit">Supprimer</button>
        </form>
    </div>
@endsection