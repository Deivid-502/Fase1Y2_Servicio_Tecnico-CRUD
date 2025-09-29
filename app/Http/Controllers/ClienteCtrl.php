<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteCtrl extends Controller
{
    public function index()
    {
        $lista = Cliente::orderBy('id','desc')->paginate(12);
        return view('clientes.index', compact('lista'));
    }

    public function create()
    {
        $registro = null;
        return view('clientes.create', compact('registro'));
    }

    public function store(Request $r)
    {
        $r->validate(['nombre'=>'required|string|max:150']);

        Cliente::create($r->only(['nombre','telefono','email','direccion','documento']));

        return redirect()->route('clientes.index')->with('ok','Cliente guardado');
    }

    public function show($id)
    {
        $registro = Cliente::findOrFail($id);
        return view('clientes.show', compact('registro'));
    }

    public function edit($id)
    {
        $registro = Cliente::findOrFail($id);
        return view('clientes.edit', compact('registro'));
    }

    public function update(Request $r, $id)
    {
        $r->validate(['nombre'=>'required|string|max:150']);

        $registro = Cliente::findOrFail($id);
        $registro->update($r->only(['nombre','telefono','email','direccion','documento']));

        return redirect()->route('clientes.index')->with('ok','Cliente actualizado');
    }

    public function destroy($id)
    {
        $registro = Cliente::findOrFail($id);
        $registro->delete();
        return redirect()->route('clientes.index')->with('ok','Cliente borrado');
    }
}
