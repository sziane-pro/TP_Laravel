<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Boxes;
use App\Models\Tenants;
use App\Models\ContractModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContractController extends Controller
{
    /**
     * Affiche la liste des contrats.
     */
    public function index()
    {
        // On récupère tous les contrats du propriétaire connecté
        $contracts = Contracts::where('user_id', Auth::id())->get();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {

        $boxes = Boxes::where('user_id', Auth::id())->get();
        $tenants = Tenants::where('user_id', Auth::id())->get();
        $contractModels = ContractModels::where('user_id', Auth::id())->get();
        return view('contracts.create', compact('boxes', 'tenants', 'contractModels'));
    }

    /**
     * Stocke un nouveau contrat en base.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'monthly_price' => 'required|numeric',
            'boxes_id' => 'required|exists:boxes,id',
            'tenants_id' => 'required|exists:tenants,id',
            'contract_models_id' => 'required|exists:contract_models,id',
        ]);

        $validated['user_id'] = Auth::id();

        Contracts::create($validated);

        return redirect()->route('contracts.index')->with('success', 'Contrat créé avec succès.');
    }

    /**
     * Affiche un contrat.
     */
    public function show(Contracts $contracts)
    {
        return view('contracts.show', compact('contracts'));
    }

    public function preview(Request $request, $id)
    {
        $contract = Contracts::findOrFail($id);
        $tenant = $contract->tenant;
    
        // Vérifier si un modèle de contrat a été sélectionné
        $contractModel = ContractModels::find($contract->contract_models_id);
    
        if (!$contractModel) {
            return redirect()->route('contracts.index')->with('error', 'Veuillez sélectionner un modèle de contrat.');
        }
    
        $tenantData = [
            'nom'           => $tenant->lastname,
            'prenom'        => $tenant->firstname,
            'email'         => $tenant->email,
            'phone'         => $tenant->phone,
            'adresse'       => $tenant->address,
            'IBAN'          => $tenant->IBAN,
            'date_start'    => $contract->date_start,
            'date_end'      => $contract->date_end,
            'monthly_price' => $contract->monthly_price,
        ];
    
        $finalContract = $contractModel->generateContractContent($tenantData);


    
        return view('contract-models.preview', compact('finalContract'));
    }
    
    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Contracts $contracts)
    {
        $boxes = Boxes::where('user_id', Auth::id())->get();
        $tenants = Tenants::all();
        return view('contracts.edit', compact('contracts', 'boxes', 'tenants'));
    }

    /**
     * Met à jour un contrat.
     */
    public function update(Request $request, Contracts $contracts)
    {
        $validated = $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'monthly_price' => 'required|numeric',
            'boxes_id' => 'required|exists:boxes,id',
            'tenants_id' => 'required|exists:tenants,id',
        ]);

        $contracts->update($validated);

        return redirect()->route('contracts.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    /**
     * Supprime un contrat.
     */
    public function destroy(Request $request)
    {
        $contracts = Contracts::findOrFail($request-> get('id'));
        $contracts->delete();

        return redirect()->route('contracts.index')->with('success', 'Contrat supprimé avec succès.');
    }
}
