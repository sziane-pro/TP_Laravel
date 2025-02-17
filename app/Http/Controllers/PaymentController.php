<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Contracts;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Affiche la liste des paiements d'un contrat
     */
    public function index($contractId)
    {
        $contract = Contracts::findOrFail($contractId);
        $payments = $contract->payments;
        return view('payments.index', compact('contract', 'payments'));
    }

    /**
     * Génère automatiquement les paiements lors de la création du contrat
     */
    public static function generatePayments(Contracts $contract)
    {
        $currentDate = Carbon::parse($contract->date_start);
        $endDate = Carbon::parse($contract->date_end);

        while ($currentDate->lessThanOrEqualTo($endDate)) {
            Payment::create([
                'contract_id' => $contract->id,
                'date_payment_due' => $currentDate->format('Y-m-d'),
                'amount_paid' => $contract->monthly_price,
                'status' => 'en attente',
            ]);
            $currentDate->addMonth();
        }
    }

    /**
     * Met à jour l'état d'un paiement
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update([
            'date_payment_received' => $request->date_payment_received,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Paiement mis à jour avec succès.');
    }

    
}
