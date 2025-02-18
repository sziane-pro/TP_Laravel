<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paiements</title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h1>Suivi des paiements</h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Suivi des paiements - Contrat #{{ $contract->id }}</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date d'échéance</th>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->date_payment_due }}</td>
                                        <td>{{ $payment->amount_paid }} €</td>
                                        <td>
                                            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="date" name="date_payment_received" 
                                                       value="{{ $payment->date_payment_received }}" class="form-control">
                                        </td>
                                        <td>
                                            <select name="status" class="form-control">
                                                <option value="en attente" {{ $payment->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                                                <option value="payé" {{ $payment->status == 'payé' ? 'selected' : '' }}>Payé</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('payments.generateBill', $payment->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Générer une facture</button>
                                            </form>
                                        </td>
                                        <td>
                                            @if($payment->bill_path)
                                                <a href="{{ asset('storage/' . $payment->bill_path) }}" target="_blank"
                                                   class="btn btn-success btn-sm">
                                                    Voir la facture
                                                </a>
                                            @endif
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
</x-app-layout>

</html>
