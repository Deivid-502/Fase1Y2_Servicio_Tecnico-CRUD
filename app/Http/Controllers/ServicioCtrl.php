<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Tecnico;
use App\Models\EstadoServicio;
use App\Models\HistEstado;
use Illuminate\Http\Request;

class ServicioCtrl extends Controller
{
    public function index()
    {
        $lista = Servicio::with(['cliente','equipo.marca','tecnico','estado'])->orderBy('fecha_recibido','desc')->paginate(12);
        return view('servicios.index', compact('lista'));
    }

    public function create()
    {
        $servicio = null;
        $clientes = Cliente::orderBy('nombre')->get();
        $equipos = Equipo::with('marca')->orderBy('id','desc')->get();
        $tecnicos = Tecnico::where('activo',1)->orderBy('nombre')->get();
        $estados = EstadoServicio::orderBy('orden')->get();
        return view('servicios.create', compact('servicio','clientes','equipos','tecnicos','estados'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'folio'=>'required|string|max:50|unique:servicios,folio',
            'cliente_id'=>'required|exists:clientes,id',
            'equipo_id'=>'required|exists:equipos,id',
            'fecha_recibido'=>'required|date',
            'problema_informado'=>'required|string',
            'estado_actual_id'=>'required|exists:servicio_estados,id'
        ]);

        $data = $r->only([
            'folio','cliente_id','equipo_id','tecnico_id','estado_actual_id',
            'fecha_recibido','fecha_entrega','problema_informado','diagnostico',
            'trabajo_realizado','precio_estimado','total'
        ]);

        $s = Servicio::create($data);

        HistEstado::create([
            'servicio_id' => $s->id,
            'estado_id' => $s->estado_actual_id,
            'cambiado_por_tecnico_id' => $s->tecnico_id,
            'nota' => 'Estado inicial',
            'fecha_cambio' => now()
        ]);

        return redirect()->route('servicios.index')->with('ok','Servicio creado');
    }

    public function show($id)
    {
        $servicio = Servicio::with(['cliente','equipo.marca','tecnico','estado'])->findOrFail($id);
        $hist = HistEstado::where('servicio_id',$servicio->id)->with('estado','tecnico')->orderBy('fecha_cambio','desc')->get();
        return view('servicios.show', compact('servicio','hist'));
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        $clientes = Cliente::orderBy('nombre')->get();
        $equipos = Equipo::with('marca')->orderBy('id','desc')->get();
        $tecnicos = Tecnico::where('activo',1)->orderBy('nombre')->get();
        $estados = EstadoServicio::orderBy('orden')->get();
        return view('servicios.edit', compact('servicio','clientes','equipos','tecnicos','estados'));
    }

    public function update(Request $r, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $r->validate([
            'folio'=>'required|string|max:50|unique:servicios,folio,'.$servicio->id,
            'cliente_id'=>'required|exists:clientes,id',
            'equipo_id'=>'required|exists:equipos,id',
            'fecha_recibido'=>'required|date',
        ]);

        $oldEstado = $servicio->estado_actual_id;

        $servicio->update($r->only([
            'folio','cliente_id','equipo_id','tecnico_id','estado_actual_id',
            'fecha_recibido','fecha_entrega','problema_informado','diagnostico',
            'trabajo_realizado','precio_estimado','total'
        ]));

        if ($oldEstado != $servicio->estado_actual_id) {
            HistEstado::create([
                'servicio_id' => $servicio->id,
                'estado_id' => $servicio->estado_actual_id,
                'cambiado_por_tecnico_id' => $servicio->tecnico_id,
                'nota' => 'Cambio de estado',
                'fecha_cambio' => now()
            ]);
        }

        return redirect()->route('servicios.index')->with('ok','Servicio actualizado');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('servicios.index')->with('ok','Servicio eliminado');
    }
}
