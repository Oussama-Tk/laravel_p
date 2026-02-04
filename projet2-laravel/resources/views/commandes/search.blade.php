<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche Commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">🔎 Rechercher des commandes</h2>

    <form method="GET" action="{{ route('commandes.search') }}" class="mb-4 row g-2 align-items-center">
        <div class="col-auto">
            <label for="client_id" class="col-form-label">Filtrer par client :</label>
        </div>
        <div class="col-auto">
            <select name="client_id" id="client_id" class="form-select" onchange="this.form.submit()">
                <option value="">Tous</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <a href="{{ route('commandes.search') }}" class="btn btn-outline-secondary">Réinitialiser</a>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes as $cmd)
                        <tr>
                            <td>{{ $cmd->id }}</td>
                            <td>{{ $cmd->date }}</td>
                            <td>{{ $cmd->client->nom ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('commandes.show', $cmd) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Aucune commande trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $commandes->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <div>
        <a href="{{ route('commandes.index') }}" class="btn btn-outline-secondary mt-3">Retour</a>
    </div>

</div>

</body>
</html>