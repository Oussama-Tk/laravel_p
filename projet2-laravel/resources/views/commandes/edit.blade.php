<div>
    <form action="{{ route('commandes.update' , $commande->id) }}" method="POST">
        @method('PUT') 
        @csrf
        <div class="mb-3">

        </div>
    </form>
</div>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <form action="{{ route('commandes.update' , $commande->id) }}" method="POST">
                    @method('PUT') 
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Date de la commande</label>
                        <input type="date" value="{{ $commande->date }}" name="date" class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="client_id" class="form-label">Client</label>
                        <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $client->id == $commande->client_id ? 'selected' : '' }}>
                                    {{ $client->nom }} {{ $client->prenom }}
                                </option>
                            @endforeach
                        </select>

                        @error('client_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-warning">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>