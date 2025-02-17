<div class="container">
    <h1 class="mb-4">Modèles de contrats</h1>
    <a href="{{ route('contract-models.create') }}" class="btn btn-primary">Créer un contrat</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contractModels as $contract)
                <tr>
                    <td>{{ $contract->name }}</td>
                    <td>
                        <a href="{{ route('contract-models.show', $contract->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('contract-models.edit', $contract->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('contract-models.destroy') }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $contract->id }}" name="id">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>