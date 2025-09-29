<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoCtrl extends Controller
{
    public function index()
    {
        $lista = Tecnico::orderBy('nombre')->paginate(12);
        return view('tecnicos.index', compact('lista'));
    }

    public function create()
    {
        $registro = null;
        return view('tecnicos.create', compact('registro'));
    }

    public function store(Request $r)
    {
        $r->validate(['nombre'=>'required|string|max:150']);

        Tecnico::create([
            'nombre'=>$r->nombre,
            'email'=>$r->email,
            'telefono'=>$r->telefono,
            'activo'=> $r->has('activo') ? 1 : 0
        ]);

        return redirect()->route('tecnicos.index')->with('ok','Técnico creado');
    }

    public function show($id)
    {
        $registro = Tecnico::findOrFail($id);
        return view('tecnicos.show', compact('registro'));
    }

    public function edit($id)
    {
        $registro = Tecnico::findOrFail($id);
        return view('tecnicos.edit', compact('registro'));
    }

    public function update(Request $r, $id)
    {
        $r->validate(['nombre'=>'required|string|max:150']);
        $registro = Tecnico::findOrFail($id);
        $registro->update([
            'nombre'=>$r->nombre,
            'email'=>$r->email,
            'telefono'=>$r->telefono,
            'activo'=> $r->has('activo') ? 1 : 0
        ]);
        return redirect()->route('tecnicos.index')->with('ok','Técnico actualizado');
    }

    public function destroy($id)
    {
        $registro = Tecnico::findOrFail($id);
        $registro->delete();
        return redirect()->route('tecnicos.index')->with('ok','Técnico borrado');
    }
}
