<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Boxes;


class BoxController extends Controller
{
    public function index()
    {
        $boxes = Boxes::where('user_id', Auth::id())->get();
        return view('boxes.index', compact('boxes'));
    }
    
    public function create()
    {
        return view('boxes.create');
    }
    
    public function show($id)
    {
        $boxes = Boxes::find($id);
        return view('boxes.show', compact('boxes'));
    }
    
    public function store(Request $request)
    {
        Boxes::create([
            'name' => $request->name,
            'address' => $request->address,
            'price' => $request->price,
            'size' => $request->size,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('boxes.index');
    }

    public function edit($id)
    {
        $boxes = Boxes::find($id);
        return view('boxes.edit', compact('boxes'));
    }

    public function update(Request $request, $id)
    {
        $boxes = Boxes::find($id);
        $boxes->name = $request->get('name');
        $boxes->address = $request->get('address');
        $boxes->price = $request->get('price');
        $boxes->size = $request->get('size');
        $boxes->save();

        return redirect()->route('boxes.index');
    }

    public function destroy(Request $request)
    {
        $boxes = Boxes::find($request->get('id'));
        $boxes->delete();

        return redirect()->route('boxes.index');
    }
}
