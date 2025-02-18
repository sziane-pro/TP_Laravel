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
        <h1 class="mb-4">Ajouter un box</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <form action="{{ route('boxes.store') }}" method="POST" class="form-column">
                            @csrf
                            <div class="form_item">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="form_item">
                                <label for="address">Adresse</label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div class="form_item">
                                <label for="price">Prix</label>
                                <input type="text" name="price" id="price">
                            </div>
                            <div class="form_item">
                                <label for="size">Superficie</label>
                                <input type="text" name="size" id="size">
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