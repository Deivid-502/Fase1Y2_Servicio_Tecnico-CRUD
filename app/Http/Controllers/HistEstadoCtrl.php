<?php

namespace App\Http\Controllers;

use App\Models\HistEstado;
use App\Models\Servicio;
use App\Models\EstadoServicio;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class HistEstadoCtrl extends Controller
{
    public function index()
    {
        $lista = HistEstado::with(['servicio','estado','tecnico'])->orderBy('fecha_cambio','desc')->paginate(20);
        return view('hist-estados.index', compact('lista'));
    }

    public function create()
    {
        $registro = null;
        $servicios = Servicio::orderBy('folio')->get();
        $estados = EstadoServicio::orderBy('orden')->get();
        $tecnicos = Tecnico::where('activo',1)->orderBy('nombre')->get();
        return view('hist-estados.create', compact('registro','servicios','estados','tecnicos'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'servicio_id'=>'required|exists:servicios,id',
            'estado_id'=>'required|exists:servicio_estados,id'
        ]);

        $data = $r->only(['servicio_id','estado_id','cambiado_por_tecnico_id','nota']);
        $data['fecha_cambio'] = $r->fecha_cambio ? $r->fecha_cambio : now();

        $registro = HistEstado::create($data);

        try {
            $s = Servicio::find($registro->servicio_id);
            if ($s) {
                $s->update(['estado_actual_id' => $registro->estado_id]);
            }
        } catch (\Throwable $e) {
        }

        return redirect()->route('hist-estados.index')->with('ok','Cambio registrado');
    }

    public function show($id)
    {
        $registro = HistEstado::with(['servicio','estado','tecnico'])->findOrFail($id);
        return view('hist-estados.show', compact('registro'));
    }

    public function edit($id)
    {
        $registro = HistEstado::findOrFail($id);
        $servicios = Servicio::orderBy('folio')->get();
        $estados = EstadoServicio::orderBy('orden')->get();
        $tecnicos = Tecnico::where('activo',1)->orderBy('nombre')->get();
        return view('hist-estados.edit', compact('registro','servicios','estados','tecnicos'));
    }

    public function update(Request $r, $id)
    {
        $registro = HistEstado::findOrFail($id);

        $r->validate([
            'servicio_id'=>'required|exists:servicios,id',
            'estado_id'=>'required|exists:servicio_estados,id'
        ]);

        $data = $r->only(['servicio_id','estado_id','cambiado_por_tecnico_id','nota']);
        $data['fecha_cambio'] = $r->fecha_cambio ? $r->fecha_cambio : $registro->fecha_cambio;

        $registro->update($data);

        try {
            $s = Servicio::find($registro->servicio_id);
            if ($s) {
                $s->update(['estado_actual_id' => $registro->estado_id]);
            }
        } catch (\Throwable $e) {}

        return redirect()->route('hist-estados.index')->with('ok','Hist actualizado');
    }

    public function destroy($id)
    {
        $registro = HistEstado::findOrFail($id);
        $registro->delete();
        return redirect()->route('hist-estados.index')->with('ok','Registro borrado');
    }
}
