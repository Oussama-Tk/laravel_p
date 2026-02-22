<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Commande #{{ $commande->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Commande n°{{ $commande->id }}</h2>
                <span class="badge bg-primary fs-6">Date : {{ \Carbon\Carbon::parse($commande->date)->format('d/m/Y') }}</span>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Informations Client</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Nom complet :</strong> {{ $commande->client->nom }} {{ $commande->client->prenom }}</p>
                    <p class="mb-0 text-muted">ID Client : #{{ $commande->client->id }}</p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Détails des articles</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Produit</th>
                                <th class="text-center">Prix Unitaire</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-end">Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalGeneral = 0; @endphp
                            @foreach($commande->produits as $produit)
                                @php 
                                    $sousTotal = $produit->prix * $produit->pivot->qte_cmd;
                                    $totalGeneral += $sousTotal;
                                @endphp
                                <tr>
                                    <td>{{ $produit->nom }}</td>
                                    <td class="text-center">{{ number_format($produit->prix, 2) }} €</td>
                                    <td class="text-center">{{ $produit->pivot->qte_cmd }}</td>
                                    <td class="text-end fw-bold">{{ number_format($sousTotal, 2) }} €</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-secondary">
                                <td colspan="3" class="text-end"><strong>TOTAL À PAYER</strong></td>
                                <td class="text-end fs-5 fw-bold text-primary">{{ number_format($totalGeneral, 2) }} €</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>

        </div>
    </div>

    {{-- Ajouter Produit a la Commande existant : --}}
    
    <div class="card mb-4 border-primary shadow-sm mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Ajouter un produit à cette commande</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('commandes.ajouterProduit', $commande->id) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Sélectionner un produit</label>
                        <select name="produit_id" class="form-select" required>
                            <option value="">-- Choisir un article --</option>
                            @foreach($produits as $p)
                                <option value="{{ $p->id }}">{{ $p->nom }} ({{ $p->prix }} €)</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Quantité</label>
                        <input type="number" name="qte_cmd" class="form-control" value="1" min="1" required>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Ajouter au panier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>