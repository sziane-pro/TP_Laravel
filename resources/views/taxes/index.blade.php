<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Déclaration d'Impôts</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1>Déclaration des Revenus Fonciers</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <h2>Résumé Fiscal</h2>
                        <p><strong>Revenus fonciers perçus :</strong> {{ number_format($totalRevenue, 2, ',', ' ') }} €</p>
                        <p><strong>Régime fiscal applicable :</strong> {{ $regime }}</p>
                        <p><strong>Case à renseigner :</strong> {{ $declarationCase }}</p>
                        <p><strong>Montant imposable :</strong> {{ number_format($imposableAmount, 2, ',', ' ') }} €</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>
