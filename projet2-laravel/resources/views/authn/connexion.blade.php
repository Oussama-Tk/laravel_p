<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>connexion</title>
</head>
<body>
    @if(session('error')) <p style="color: red">{{ session('error') }}</p> @endif
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <input type="email" required value="{{ old('email') }}" name="email" placeholder="entrer email"><br>
        @error('email')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <input type="password" required name="password" >
        @error('password')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button type="submit">Login</button>
        <a href="{{ route('register') }}">tu n'a pas encore du compte ?</a>
    </form>
</body>
</html>