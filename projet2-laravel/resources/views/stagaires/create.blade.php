<h1>Fiche Stagiaire : </h1>

<form action=" {{ route('stagaires.store') }}" method="POST">
    @csrf
    Nom Stagiaire :    <input type="text" name="nom"><br><br>
    Prénom Stagiaire : <input type="text" name="prenom"><br><br>
    Date N Stagiaire :    <input type="date" name="date_naissance"><br><br>
    <button type="submit">Ajouter</button>
</form>

