<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Contracts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function index($contractId)
    {
        $contract = Contracts::findOrFail($contractId);
        $payments = $contract->payments;
        return view('payments.index', compact('contract', 'payments'));
    }

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

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update([
            'date_payment_received' => $request->date_payment_received,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Paiement mis à jour avec succès.');
    }

    public function generateBill($id)
    {
        $payment = Payment::findOrFail($id);

        $billFileName = 'facture_' . $payment->id . '_' . time() . '.pdf';
        $billPath = 'bills/' . $billFileName;

        $pdf = Pdf::loadView('bills.template', compact('payment'));

        Storage::disk('public')->put($billPath, $pdf->output());

        $payment->update(['bill_path' => $billPath]);

        return back()->with('success', 'Facture générée avec succès.');
    }

}
