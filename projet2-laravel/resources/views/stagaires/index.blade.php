

<h1>Liste des stagiaires</h1>

<a href="{{ route('stagaires.create') }}">Ajouter Stagiaire</a>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date Naissance</th>
        <th colspan="3">Actions</th>
    </tr>
    @foreach($stagaires as $stagiaire)
    <tr>
        <td>{{$stagiaire['id']}}</td>
        <td>{{$stagiaire['nom']}}</td>
        <td>{{$stagiaire['prenom']}}</td>
        <td>{{$stagiaire['date_naissance']}}</td>
        <td>
            <a href="{{route('stagaires.show', $stagiaire['id'])}}">Show</a>
            <a href="{{route('stagaires.edit', $stagiaire['id'])}}">Edit</a>
            <form action="{{ route('stagaires.destroy' , $stagiaire['id']) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button>🗑️</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>
