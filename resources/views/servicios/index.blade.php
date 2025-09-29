@extends('layouts.app')
@section('titulo','Servicios')
@section('contenido')
<div class="topbar">
    <div style="display:flex; gap:8px;">
        <a class="btn btn-ghost" href="{{ route('servicios.index') }}">Todos</a>
    </div>
    <div>
        <a class="btn btn-primary" href="{{ route('servicios.create') }}">+ Nuevo servicio</a>
    </div>
</div>

<table>
    <thead><tr><th>Folio</th><th>Cliente</th><th>Equipo</th><th>Técnico</th><th>Estado</th><th>Recibido</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $s)
    <tr>
        <td>{{ $s->folio }}</td>
        <td>{{ $s->cliente->nombre ?? '—' }}</td>
        <td>{{ $s->equipo->modelo ?? $s->equipo->serial ?? '—' }}</td>
        <td>{{ $s->tecnico->nombre ?? '—' }}</td>
        <td>{{ $s->estado->nombre ?? '—' }}</td>
        <td>{{ $s->fecha_recibido ? $s->fecha_recibido->format('Y-m-d H:i') : '' }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('servicios.show',$s->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('servicios.edit',$s->id) }}">Editar</a>
            <form action="{{ route('servicios.destroy',$s->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Eliminar servicio?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="7">No hay servicios</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
