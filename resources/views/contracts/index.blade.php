<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrats</title>
</head>
<x-app-layout>
    <x-slot name="header">
    <h1>Liste des contrats</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Nouveau contrat</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date de début</th>
                                    <th>Date de fin</th>
                                    <th>Prix mensuel</th>
                                    <th>Box</th>
                                    <th>Locataire</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contracts as $contract)
                                    <tr>
                                        <td>{{ $contract->date_start }}</td>
                                        <td>{{ $contract->date_end }}</td>
                                        <td>{{ $contract->monthly_price }} €</td>
                                        <td>{{ $contract->box->name ?? 'N/A' }}</td>
                                        <td>{{ $contract->tenant->lastname ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('contracts.show', $contract->id) }}"
                                                class="btn btn-info btn-sm">Voir</a>
                                            <a href="{{ route('contracts.edit', $contract->id) }}"
                                                class="btn btn-warning btn-sm">Modifier</a>
                                            <!-- Bouton pour prévisualiser le contrat généré -->
                                            <a href="{{ route('contracts.preview', $contract->id) }}"
                                                class="btn btn-secondary btn-sm">Prévisualiser</a>
                                            <form action="{{ route('contracts.destroy') }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?');">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $contract->id }}" name="id">
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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