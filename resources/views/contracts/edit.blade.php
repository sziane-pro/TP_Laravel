<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrats</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1 class="mb-4">Modifier le contrat</h1>   
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="wrapper">
                        <form action="{{ route('contracts.update', $contract->id) }}" method="POST" class="form-column">
                            @csrf
                            @method('PUT')
                            <div class="form_item">
                                <label for="boxes_id" class="form-label">Box</label>
                                <select name="boxes_id" id="boxes_id" class="form-control">
                                    @foreach($boxes as $box)
                                        <option value="{{ $box->id }}" {{ $box->id == $contract->boxes_id ? 'selected' : '' }}>
                                            {{ $box->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form_item">
                                <label for="tenants_id" class="form-label">Locataire</label>
                                <select name="tenants_id" id="tenants_id" class="form-control">
                                    @foreach($tenants as $tenant)
                                        <option value="{{ $tenant->id }}" {{ $tenant->id == $contract->tenants_id ? 'selected' : '' }}>
                                            {{ $tenant->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form_item">
                                <label for="date_start" class="form-label">Date de début</label>
                                <input type="date" name="date_start" id="date_start" class="form-control"
                                    value="{{ $contract->date_start }}" required>
                            </div>
                            <div class="form_item">
                                <label for="date_end" class="form-label">Date de fin</label>
                                <input type="date" name="date_end" id="date_end" class="form-control"
                                    value="{{ $contract->date_end }}" required>
                            </div>
                            <div class="form_item">
                                <label for="monthly_price" class="form-label">Prix mensuel</label>
                                <input type="number" step="0.01" name="monthly_price" id="monthly_price"
                                    class="form-control" value="{{ $contract->monthly_price }}" required>
                            </div>
                            <button type="submit" class="btn btn-blue">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>