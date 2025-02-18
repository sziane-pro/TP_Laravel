<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boxes</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="mb-4">Informations de {{ $boxes->name }}</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <p>Nom : <strong>{{ $boxes->name }}</strong></p>
                        <p>Adresse : <strong>{{ $boxes->address }}</strong></p>
                        <p>Prix : <strong>{{ $boxes->price }}</strong>€</p>
                        <p>Superficie : <strong>{{ $boxes->size }}</strong> m<sup>2</sup></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>