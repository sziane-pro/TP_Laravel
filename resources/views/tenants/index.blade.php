<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locataires</title>
</head>
    <div class="container text-light">
        <hr>
        <a href="{{ route('tenants.create') }}" class="btn btn-primary">Ajouter un locataire</a>
        <hr>
        <div class="row d-flex justify-content-between align-items-center">
            <table>
                <thead>
                    <th class="p-3">Id</th>
                    <th class="p-3">Nom</th>
                    <th class="p-3">Prénom</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Téléphone</th>
                    <th class="p-3">Adresse</th>
                    <th class="p-3">IBAN</th>
                    <th class="p-3">User ID</th>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                    <tr>
                        <td class="p-3">{{ $tenant->id }}</td>
                        <td class="p-3">{{ $tenant->lastname }}</td>
                        <td class="p-3">{{ $tenant->firstname }}</td>
                        <td class="p-3">{{ $tenant->email }}</td>
                        <td class="p-3">{{ $tenant->phone }}</td>
                        <td class="p-3">{{ $tenant->address }}</td>
                        <td class="p-3">{{ $tenant->IBAN }}</td>
                        <td class="p-3">{{ $tenant->user_id }}</td>
                        <td class="p-3"> <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-light">Modifier</a></td>
                        <td class="p-3"><a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-light">Voir</a></td>
                    </tr>

                        <td class="p-3">
                            <form action="{{ route('tenants.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $tenant->id }}" name="id">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    </body>

</html>