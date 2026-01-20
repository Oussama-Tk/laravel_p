<x-headCom />

<x-headerCom />

<div id = "main" class = "row" >
    {{ $slot }}
</div>
<div>
    <h2>Liste des etudiants :</h2>
    <ul>
        @foreach ($etudiants as $et)
            <li>{{ $et['nom'] }}</li>
        @endforeach
    </ul> 
</div>

<x-footerCom />