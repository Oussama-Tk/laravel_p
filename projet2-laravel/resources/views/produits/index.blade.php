<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">
    
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>📦 Liste des Produits</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('produits.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nouvelle Produit
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Nom</th>
                        <th>Quantite en Stock</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produits as $pr)
                        <tr>
                            <td>{{ $pr->id }}</td>
                            <td>{{ $pr->nom }}</td>
                            <td>{{ $pr->qte_stock }}</td>
                            <td>{{ $pr->prix }}</td>
                            <td >
                                @if($pr->image !== '')
                                    <img src="{{ asset('storage/'.$pr->image) }}" alt="" style="max-width:60px ; height: 60px; border-radius: 12px">
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    
                                    <a href="{{ route('produits.show', $pr) }}" class="btn btn-sm btn-info text-white" title="Voir les détails">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('produits.edit', $pr) }}" class="btn btn-sm btn-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('produits.destroy', $pr) }}" method="POST" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette produit ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Aucune produit trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>