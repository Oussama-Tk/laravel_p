<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>notes</title>
</head>
<body>
    
    <h2>Le nombre des Etudiants : </h2>
    @empty($etudiants)
        <h4>le tableau est vide !</h4>
    @endempty
    <h4>{{collect($etudiants)->count()}}</h4>
    @php
        $moy = collect($etudiants)->avg('note') ;
    @endphp
    <h2>Liste des etudiants :</h2>
    <ul>
        @foreach ($etudiants as $et)
            @if ($et['note'] > $moy)
                
                <li>{{ $et['nom'] }}</li>
                
            @endif
        @endforeach
    </ul>
</body>
</html>