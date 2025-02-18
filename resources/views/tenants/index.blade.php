<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locataires</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="mb-4">Liste des Locataires</h1>   
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <a href="{{ route('tenants.create') }}" class="btn btn-green">Ajouter un locataire</a>
                        <div>
                            <table>
                                <thead>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>IBAN</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($tenants as $tenant)
                                        <tr>
                                            <td>{{ $tenant->lastname }}</td>
                                            <td>{{ $tenant->firstname }}</td>
                                            <td>{{ $tenant->email }}</td>
                                            <td>{{ $tenant->phone }}</td>
                                            <td>{{ $tenant->address }}</td>
                                            <td>{{ $tenant->IBAN }}</td>
                                            <td class="actions"> <a href="{{ route('tenants.edit', $tenant->id) }}"
                                                    class="btn btn-blue">Modifier</a><a href="{{ route('tenants.show', $tenant->id) }}"
                                                    class="btn btn-blue">Voir</a>
                                            <form action="{{ route('tenants.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $tenant->id }}" name="id">
                                                <button class="btn btn-red" type="submit">Supprimer</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
</body>

</html>