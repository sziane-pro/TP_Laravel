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
        <h1 class="mb-4">Ajouter un locataire</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <form action="{{ route('tenants.store') }}" method="POST" class="form-column">
                            @csrf
                            <div class="form_item">
                                <label for="lastname">Nom</label>
                                <input type="text" name="lastname" id="lastname">
                            </div>
                            <div class="form_item">
                                <label for="firstname">Prénom</label>
                                <input type="text" name="firstname" id="firstname">
                            </div>
                            <div class="form_item">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="form_item">
                                <label for="phone">Téléphone</label>
                                <input type="text" name="phone" id="phone">
                            </div>
                            <div class="form_item">
                                <label for="address">Adresse</label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div class="form_item">
                                <label for="IBAN">IBAN</label>
                                <input type="text" name="IBAN" id="IBAN">
                            </div>
                            <button type="submit" class="btn btn-green">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>