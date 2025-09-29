<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaCtrl extends Controller
{
    public function index()
    {
        $lista = Marca::orderBy('nombre')->paginate(20);
        return view('marcas.index', compact('lista'));
    }

    public function create()
    {
        $registro = null;
        return view('marcas.create', compact('registro'));
    }

    public function store(Request $r)
    {
        $r->validate(['nombre'=>'required|string|max:100']);
        Marca::create(['nombre'=>$r->nombre]);
        return redirect()->route('marcas.index')->with('ok','Marca guardada');
    }

    public function show($id)
    {
        $registro = Marca::findOrFail($id);
        return view('marcas.show', compact('registro'));
    }

    public function edit($id)
    {
        $registro = Marca::findOrFail($id);
        return view('marcas.edit', compact('registro'));
    }

    public function update(Request $r, $id)
    {
        $r->validate(['nombre'=>'required|string|max:100']);
        $registro = Marca::findOrFail($id);
        $registro->update(['nombre'=>$r->nombre]);
        return redirect()->route('marcas.index')->with('ok','Marca actualizada');
    }

    public function destroy($id)
    {
        $registro = Marca::findOrFail($id);
        $registro->delete();
        return redirect()->route('marcas.index')->with('ok','Marca borrada');
    }
}
