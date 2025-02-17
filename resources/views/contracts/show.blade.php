<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrats</title>
</head>
<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <h1>Détails du contrat</h1>
                        <p><strong>Date de début :</strong> {{ $contract->date_start }}</p>
                        <p><strong>Date de fin :</strong> {{ $contract->date_end }}</p>
                        <p><strong>Prix mensuel :</strong> {{ $contract->monthly_price }} €</p>
                        <p><strong>Box :</strong> {{ $contract->box->name ?? 'N/A' }}</p>
                        <p><strong>Locataire :</strong> {{ $contract->tenant->lastname ?? 'N/A' }}</p>
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>