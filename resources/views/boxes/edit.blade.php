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
        <h1 class="mt-5">Modification d'un box</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <form action="{{ route('boxes.update', $boxes->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-column">
                                <div class="form_item">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control mt-3" id="name" name="name" value="{{ $boxes->name }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="address">Adresse</label>
                                    <input type="text" class="form-control mt-3" id="address" name="address" value="{{ $boxes->address }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="price">Prix</label>
                                    <input type="text" class="form-control mt-3" id="price" name="price" value="{{ $boxes->price }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="size">Superficie</label>
                                    <input type="text" class="form-control mt-3" id="size" name="size" value="{{ $boxes->size }}" required>
                                </div>
                            </div>

                            <div class="form-group p-2 mt-3">
                                <button type="submit" class="btn btn-blue">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>