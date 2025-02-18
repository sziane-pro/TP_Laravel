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
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <a href="{{ route('contracts.create') }}" class="btn btn-green">Créer un contrat</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Locataire</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Prix Mensuel (€)</th>
                                    <th>Suivi Paiements</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contracts as $contract)
                                    <tr>
                                        <td>{{ $contract->tenant->lastname }} {{ $contract->tenant->firstname }}</td>
                                        <td>{{ $contract->date_start }}</td>
                                        <td>{{ $contract->date_end }}</td>
                                        <td>{{ $contract->monthly_price }}</td>
                                        <td>
                                            <a href="{{ route('payments.index', $contract->id) }}" class="btn btn-blue">Voir Paiements</a>
                                        </td>
                                        <td class="actions">
                                            <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-blue">Voir</a>
                                            <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-blue">Modifier</a>
                                            <a href="{{ route('contracts.preview', $contract->id) }}" class="btn btn-blue">Prévisualiser le contrat</a>
                                            <form action="{{ route('contracts.destroy') }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $contract->id }}">
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