<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture #{{ $payment->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; padding: 20px; }
        .header { text-align: center; font-size: 20px; font-weight: bold; }
        .content { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Facture #{{ $payment->id }}</div>
        <div class="content">
            <p><strong>Montant :</strong> {{ $payment->amount_paid }} €</p>
            <p><strong>Date d'échéance :</strong> {{ $payment->date_payment_due }}</p>
            <p><strong>Date de paiement :</strong> {{ $payment->date_payment_received ?? 'Non payé' }}</p>
            <p><strong>Statut :</strong> {{ ucfirst($payment->status) }}</p>
        </div>
    </div>
</body>
</html>
