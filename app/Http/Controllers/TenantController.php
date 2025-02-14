<?php

namespace App\Http\Controllers;
use App\Models\Tenants;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenants::where('owner_id', Auth::id())->get();
        return view('tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function show($id)
    {
        $tenants = Tenants::find($id);
        return view('tenants.show', compact('tenants'));
    }

    public function store(Request $request)
    {
        Tenants::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'IBAN' => $request->IBAN,
            'owner_id' => Auth::id(),
        ]);
        return redirect()->route('tenants.index');
    }

    public function edit($id)
    {
        $tenants = Tenants::find($id);
        return view('tenants.edit', compact('tenants'));
    }

    public function update(Request $request, $id)
    {
        $tenants = Tenants::find($id);
        $tenants->lastname = $request->get('lastname');
        $tenants->firstname = $request->get('firstname');
        $tenants->email = $request->get('email');
        $tenants->phone = $request->get('phone');
        $tenants->address = $request->get('address');
        $tenants->IBAN = $request->get('IBAN');
        $tenants->save();

        return redirect()->route('tenants.index');
    }

    public function destroy(Request $request)
    {
        $tenants = Tenants::find($request->get('id'));
        $tenants->delete();

        return redirect()->route('tenants.index');
    }
}
