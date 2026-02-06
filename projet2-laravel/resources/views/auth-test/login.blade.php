@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('auth.manual.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror">
        <input type="password" name="password" placeholder="Mot de passe">
        <button type="submit">Connexion</button>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </form>

    
@endsection