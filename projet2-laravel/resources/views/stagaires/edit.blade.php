<h1>Modifier Stagiaire numéro: {{$stagaire['id']}}</h1>
<form action="{{ 
route('stagaires.update',$stagaire['id']) }}" 
method="POST">
@method("PUT")  
@csrf
Nom Stagaire :    <input type="text" name="nom" value="{{$stagaire['nom']}}"><br><br>
Prénom Stagaire : <input type="text" name="prenom" value="{{$stagaire['prenom']}}"><br><br>
Age Stagaire :    <input type="date" name="date_naissance" value="{{$stagaire['date_naissance']}}"><br><br>
<button type="submit">Modifier</button>
</form>
