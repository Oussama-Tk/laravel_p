<h1>Détails Stagiaire</h1>
<div>
<p>Id : {{$stagaire['id']}}</p>
<p>Nom :{{$stagaire['nom']}}</p>
<p>Prénom :{{$stagaire['prenom']}}</p>
<p>Date Naissance :{{$stagaire['date_naissance']}}</p>
<a href="{{route('stagaires.edit', $stagaire['id'])}}">Edit</a>
</div>