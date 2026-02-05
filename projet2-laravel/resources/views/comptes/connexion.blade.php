<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 card mb-4 shadow-sm">
        <h1>Connexion</h1>
        @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif
        @if(session('error')) <p style="color:red">{{ session('error') }}</p> @endif
        <form action="/connexion" method="POST" class="card-body">
            @csrf
            <input type="text" name="login" placeholder="Votre Login" class="form-control mb-3">
            <input type="password" name="mot_passe" placeholder="Votre Mot de passe" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>