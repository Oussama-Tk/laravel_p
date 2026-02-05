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
    <div class="card mb-4 shadow-sm mt-5">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Profil User</h5>
        </div>
        <div class="card-body">
            <p class="mb-1"><strong>Login :</strong> {{ $currentUser->login }} </p>
            <p class="mb-1"><strong>Role :</strong> {{ $currentUser->profil }} </p>
            <p class="mb-0 text-muted">ID Client : #{{ $currentUser->id }}</p>
        </div>
    </div>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</body>
</html>