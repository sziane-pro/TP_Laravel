<?php

namespace App\Http\Controllers;

use App\Models\ContractModels;
use App\Models\Tenants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContractModelController extends Controller
{
    public function index()
    {
        $contractModels = ContractModels::where('user_id', Auth::id())->get();
        return view('contract-models.index', compact('contractModels'));
    }

    public function create()
    {
        return view('contract-models.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|json',
        ]);

        ContractModels::create([
            'name'    => $request->name,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('contract-models.index')->with('success', 'Modèle ajouté.');
    }

    public function show($id)
    {
        $contractModels = ContractModels::findOrFail($id);
        $contractModels->content = json_encode($contractModels->content);
        return view('contract-models.show', compact('contractModels'));
    }

    public function edit($id)
    {
        $contractModels = ContractModels::findOrFail($id);
        return view('contract-models.edit', compact('contractModels'));
    }

    public function generateContract($contractModelsId, $tenantId)
    {
        $contractModels = ContractModels::findOrFail($contractModelsId);
        $tenants = Tenants::findOrFail($tenantId);

        $tenantData = [
            'nom'     => $tenants->last_name,
            'prenom'  => $tenants->first_name,
            'email'   => $tenants->email,
            'phone'   => $tenants->phone,
            'adresse' => $tenants->address,
            'IBAN'    => $tenants->IBAN,
        ];

        $finalContract = $contractModels->generateContractContent($tenantData);

        return view('contract-models.preview', compact('finalContract'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|json',
        ]);

        $contractModels = ContractModels::findOrFail($id);
        $contractModels->update([
            'name'    => $request->name,
            'content' => $request->content,
        ]);

        return redirect()->route('contract-models.index')->with('success', 'Modèle mis à jour.');
    }

    public function destroy(Request $request)
    {
        $contractModels = ContractModels::findOrFail($request->get('id'));
        $contractModels->delete();

        return redirect()->route('contract-models.index')->with('success', 'Modèle supprimé.');
    }
}
