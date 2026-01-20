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
    {{-- <h1>titres films : </h1> --}}
    {{-- <ul>
        @foreach ($films as $film)
            <li>{{ $film->titre }}</li>
        @endforeach
    </ul>
    <h1>films apres 2022 : </h1>
    <ul>
        @foreach ($filmAnne as $film)
            <li>filme -- {{ $film->id }}</li>
        @endforeach
    </ul>
    <h1>acteurs commence par D : </h1>
        @foreach ($acteurD as $acteur)
            <li>{{ $acteur->id }} -- {{ $acteur->nom }}</li>
        @endforeach
        
    <h1>films dont la durée est supérieure à 120 minutes : </h1>
        <ul>
            @foreach ($filmSuperier as $film)
                <li>filme -- {{ $film->id }}</li>
            @endforeach
        </ul>
    <h1>les films sortis entre 2021 et 2024 : </h1>
        <ul>
            @foreach ($filmEntre as $film)
                <li>filme -- {{ $film->id }}</li>
            @endforeach
        </ul>
    <h1>nb Films : </h1>
    <h3>{{ $nb_films }}</h3>
    <h1>avg duree Films : </h1>
    <h3>{{ $avg_duree_films }}</h3>
    <h1>pagination films: </h1>
    <ul>
    @foreach($films_pages as $film)
        <li>{{ $film->titre }}</li>
    @endforeach
    </ul>

    <div class="pagination">
        {{ $films_pages->links() }}
    </div> --}}

    {{-- <h1>liste films: </h1>
    <ul>
    @foreach($films_avec_acteurs as $film)
        <h4>{{ $film->titre }} </h4>
        <li>{{ $film->liste_acteurs }}</li>
    @endforeach
    </ul> --}}
    
    {{-- <h1>liste films: </h1>
    <ul>
    @foreach($acteur_action as $ac)
        <li>{{ $ac->acteur_pr }} {{ $ac->acteur_nom }}</li>
    @endforeach
    </ul> --}}

    {{-- <h1>liste films - acteur - role: </h1>
    <ul>
    @foreach($film_acteur_role as $f)
        <li> Filme : {{ $f->titre }} | Acteur : {{ $f->nom }} | Role : {{ $f->role }}</li>
    @endforeach
    </ul> --}}
    {{-- <h1>acteurs sans films: </h1>
    <ul>
    @foreach($acteur_sans_film as $f)
        <li> {{ $f->nom }} {{ $f->prenom }} </li>
    @endforeach
    </ul> --}}

    {{-- <h1>films participations superieur a 3 : </h1>
    <ul>
    @foreach($nb_participation_trios as $f)
        <li> {{ $f->titre }} </li>
    @endforeach
    </ul> --}}


    <h1>participation entre 2010 et 2020 : </h1>
    <ul>
    @foreach($participation_entre_date as $ac)
        <li> {{ $ac->nom }}  {{ $ac->prenom }}</li>
    @endforeach
    </ul>

    {{-- <h2>test model film</h2>
    <p>{{ $test->titre }}</p> --}}
</body>
</html>