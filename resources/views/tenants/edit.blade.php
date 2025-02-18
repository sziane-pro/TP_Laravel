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
        <h1 class="mb-4">Modifier un locataire</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <form action="{{ route('tenants.update', $tenants->id) }}" method="POST" class="form-column">
                            @csrf
                            @method('PUT')
                                <div class="form_item">
                                    <label for="lastname">Nom</label>
                                    <input type="text" class="form-control mt-3" id="lastname" name="lastname" value="{{ $tenants->lastname }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="firstname">Prénom</label>
                                    <input type="text" class="form-control mt-3" id="firstname" name="firstname" value="{{ $tenants->firstname }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control mt-3" id="email" name="email" value="{{ $tenants->email }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="phone">Téléphone</label>
                                    <input type="text" class="form-control mt-3" id="phone" name="phone" value="{{ $tenants->phone }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="address">Adresse</label>
                                    <input type="text" class="form-control mt-3" id="address" name="address" value="{{ $tenants->address }}" required>
                                </div>
                                <div class="form_item">
                                    <label for="IBAN">IBAN</label>
                                    <input type="text" class="form-control mt-3" id="IBAN" name="IBAN" value="{{ $tenants->IBAN }}" required>
                                </div>

                                <button type="submit" class="btn btn-blue">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>