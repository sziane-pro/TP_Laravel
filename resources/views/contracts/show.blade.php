@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Détails du contrat</h1>
    <p><strong>Date de début :</strong> {{ $contract->date_start }}</p>
    <p><strong>Date de fin :</strong> {{ $contract->date_end }}</p>
    <p><strong>Prix mensuel :</strong> {{ $contract->monthly_price }} €</p>
    <p><strong>Box :</strong> {{ $contract->box->name ?? 'N/A' }}</p>
    <p><strong>Locataire :</strong> {{ $contract->tenant->lastname ?? 'N/A' }}</p>
    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
