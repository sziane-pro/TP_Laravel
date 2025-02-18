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
                    <div class="wrapper">
                        <a href="{{ route('boxes.create') }}" class="btn btn-green">Ajouter un box</a>
                        <div class="">
                            <table>
                                <thead>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Prix</th>
                                    <th>Superficie</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($boxes as $box)
                                        <tr>
                                            <td>{{ $box->id }}</td>
                                            <td>{{ $box->name }}</td>
                                            <td>{{ $box->address }}</td>
                                            <td>{{ $box->price }}€</td>
                                            <td>{{ $box->size }}m<sup>2</sup></td>
                                            <td class="actions"> <a href="{{ route('boxes.edit', $box->id) }}" class="btn btn-blue">Modifier</a><a href="{{ route('boxes.show', $box->id) }}" class="btn btn-blue">Voir</a>
                                                <form action="{{ route('boxes.destroy') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $box->id }}" name="id">
                                                    <button class="btn btn-red" type="submit">Supprimer</button>
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
    </div>

</x-app-layout>
</body>

</html>