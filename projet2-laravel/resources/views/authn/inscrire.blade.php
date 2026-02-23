<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>connexion</title>
</head>
<body>
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <input type="nom" required value="{{ old('nom') }}" name="nom" placeholder="entrer nom"><br>
        @error('nom')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <input type="prenom" required value="{{ old('prenom') }}" name="prenom" placeholder="entrer prenom"><br>
        @error('prenom')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <input type="email" required value="{{ old('email') }}" name="email" placeholder="entrer email"><br>
        @error('email')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <input type="password" required name="password" >
        <button type="submit">s'inscrire</button>
        <a href="{{ route('register') }}">tu n'a pas encore du compte ?</a>
    </form>
</body>
</html>