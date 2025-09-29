@extends('layouts.app')
@section('titulo','Historial de estados')
@section('contenido')
<div class="topbar">
    <div></div>
    <div>
        <a class="btn btn-primary" href="{{ route('hist-estados.create') }}">+ Nuevo registro</a>
    </div>
</div>

<table>
    <thead><tr><th>Servicio</th><th>Estado</th><th>Técnico</th><th>Fecha</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $h)
    <tr>
        <td>{{ $h->servicio->folio ?? $h->servicio_id }}</td>
        <td>{{ $h->estado->nombre ?? '—' }}</td>
        <td>{{ $h->tecnico->nombre ?? '—' }}</td>
        <td>{{ $h->fecha_cambio ? $h->fecha_cambio->format('Y-m-d H:i') : '' }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('hist-estados.show',$h->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('hist-estados.edit',$h->id) }}">Editar</a>
            <form action="{{ route('hist-estados.destroy',$h->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Borrar registro?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="5">No hay registros</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
