<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;

class EquipoCtrl extends Controller
{
    public function index()
    {
        $lista = Equipo::with('marca')->orderBy('id','desc')->paginate(12);
        return view('equipos.index', compact('lista'));
    }

    public function create()
    {
        $registro = null;
        $marcas = Marca::orderBy('nombre')->get();
        return view('equipos.create', compact('registro','marcas'));
    }

    public function store(Request $r)
    {
        $r->validate(['marca_id'=>'required|exists:marcas,id']);

        Equipo::create($r->only(['marca_id','serial','modelo','tipo','observacion']));

        return redirect()->route('equipos.index')->with('ok','Equipo guardado');
    }

    public function show($id)
    {
        $registro = Equipo::with('marca')->findOrFail($id);
        return view('equipos.show', compact('registro'));
    }

    public function edit($id)
    {
        $registro = Equipo::findOrFail($id);
        $marcas = Marca::orderBy('nombre')->get();
        return view('equipos.edit', compact('registro','marcas'));
    }

    public function update(Request $r, $id)
    {
        $r->validate(['marca_id'=>'required|exists:marcas,id']);
        $registro = Equipo::findOrFail($id);
        $registro->update($r->only(['marca_id','serial','modelo','tipo','observacion']));
        return redirect()->route('equipos.index')->with('ok','Equipo actualizado');
    }

    public function destroy($id)
    {
        $registro = Equipo::findOrFail($id);
        $registro->delete();
        return redirect()->route('equipos.index')->with('ok','Equipo borrado');
    }
}
