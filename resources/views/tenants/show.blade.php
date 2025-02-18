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
        <h1 class="mb-4">Informations du locataire : {{ $tenants->firstname }} {{ $tenants->lastname }}</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <div class="card-body">
                            <p>ID : {{ $tenants->id }}</p>
                            <p>Nom : {{ $tenants->lastname }}</p>
                            <p>Prénom : {{ $tenants->firstname }}</p>
                            <p>Email : {{ $tenants->email }}</p>
                            <p>Téléphone : {{ $tenants->phone }}</p>
                            <p>Adresse : {{ $tenants->address }}</p>
                            <p>IBAN : {{ $tenants->IBAN }}</p>
                            <p>User ID : {{ $tenants->user_id }}</p>
                        </div>
                        <a href="{{ route('tenants.index') }}" class="btn btn-blue">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>