<?php

namespace App\Http\Controllers;

use App\Models\EstadoServicio;
use Illuminate\Http\Request;

class EstadoServicioCtrl extends Controller
{
    public function index()
    {
        $lista = EstadoServicio::orderBy('orden')->paginate(30);
        return view('servicio-estados.index', compact('lista'));
    }

    public function create()
    {
        $registro = null;
        return view('servicio-estados.create', compact('registro'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'clave'=>'required|string|max:50|unique:servicio_estados,clave',
            'nombre'=>'required|string|max:100'
        ]);

        EstadoServicio::create($r->only(['clave','nombre','orden']));
        return redirect()->route('servicio-estados.index')->with('ok','Estado creado');
    }

    public function show($id)
    {
        $registro = EstadoServicio::findOrFail($id);
        return view('servicio-estados.show', compact('registro'));
    }

    public function edit($id)
    {
        $registro = EstadoServicio::findOrFail($id);
        return view('servicio-estados.edit', compact('registro'));
    }

    public function update(Request $r, $id)
    {
        $registro = EstadoServicio::findOrFail($id);

        $r->validate([
            'clave'=>'required|string|max:50|unique:servicio_estados,clave,'.$registro->id,
            'nombre'=>'required|string|max:100'
        ]);

        $registro->update($r->only(['clave','nombre','orden']));
        return redirect()->route('servicio-estados.index')->with('ok','Estado actualizado');
    }

    public function destroy($id)
    {
        $registro = EstadoServicio::findOrFail($id);
        $registro->delete();
        return redirect()->route('servicio-estados.index')->with('ok','Estado borrado');
    }
}
