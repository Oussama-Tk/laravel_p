<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-6">
            <h2>📦 Liste des Commandes</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('commandes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nouvelle Commande
            </a>
            <a href="{{ route('commandes.search') }}" class="btn btn-primary">
                <i class="bi bi-search"></i> Search
            </a>
        </div>
    </div>
    <div class="row mb-4">
        <form method="GET" action="{{ route('commandes.index') }}" class="mb-4 row g-2 align-items-center">
            <div class="col-auto">
                <label for="">Filtrer par client : </label>
            </div>
            <div class="col-auto">
                <select name="client_id" id="client_id" onchange="this.form.submit()" class="form-select">
                    <option value="">Tous</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>{{ $client->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
            <a href="{{ route('commandes.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
            </div>
        </form>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes as $commande)
                        <tr>
                            <td>{{ $commande->id }}</td>
                            
                            <td>{{ \Carbon\Carbon::parse($commande->date)->format('d/m/Y') }}</td>
                            
                            <td>
                                @if($commande->client)
                                    <span class="badge bg-info text-dark">
                                        {{ $commande->client->prenom }} {{ $commande->client->nom }}
                                    </span>
                                @else
                                    <span class="text-muted">Client inconnu</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    
                                    <a href="{{ route('commandes.show', $commande) }}" class="btn btn-sm btn-info text-white" title="Voir les détails">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('commandes.edit', $commande) }}" class="btn btn-sm btn-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('commandes.destroy', $commande) }}" method="POST" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
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
                            <td colspan="4" class="text-center text-muted">Aucune commande trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $commandes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

</body>
</html>