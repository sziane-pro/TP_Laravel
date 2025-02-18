<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modèle de contrat</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="mb-4">Liste des modèles de contrat</h1>   
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <a href="{{ route('contract-models.create') }}" class="btn btn-green">Créer un contrat</a>
                        <table>
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
                                        <td class="actions">
                                            <a href="{{ route('contract-models.show', $contract->id) }}"
                                                class="btn btn-blue">Voir</a>
                                            <a href="{{ route('contract-models.edit', $contract->id) }}"
                                                class="btn btn-blue">Modifier</a>
                                            <form action="{{ route('contract-models.destroy') }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $contract->id }}" name="id">
                                                <button type="submit" class="btn btn-red">Supprimer</button>
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
</x-app-layout>
</html>