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
        <h1 class="mb-4">Liste des boxes</h1>   
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container text-light">
                        <hr>
                        <a href="{{ route('boxes.create') }}" class="btn btn-primary">Ajouter un box</a>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <table>
                                <thead>
                                    <th class="p-3">Id</th>
                                    <th class="p-3">Nom</th>
                                    <th class="p-3">Adresse</th>
                                    <th class="p-3">Prix</th>
                                    <th class="p-3">Superficie</th>
                                </thead>
                                <tbody>
                                    @foreach ($boxes as $box)
                                        <tr>
                                            <td class="p-3">{{ $box->id }}</td>
                                            <td class="p-3">{{ $box->name }}</td>
                                            <td class="p-3">{{ $box->address }}</td>
                                            <td class="p-3">{{ $box->price }}€</td>
                                            <td class="p-3">{{ $box->size }}m2</td>
                                            <td class="p-3"> <a href="{{ route('boxes.edit', $box->id) }}"
                                                    class="btn btn-light">Modifier</a></td>
                                            <td class="p-3"><a href="{{ route('boxes.show', $box->id) }}"
                                                    class="btn btn-light">Voir</a></td>
                                        </tr>

                                        <td class="p-3">
                                            <form action="{{ route('boxes.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $box->id }}" name="id">
                                                <button class="btn btn-danger" type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
</body>

</html>