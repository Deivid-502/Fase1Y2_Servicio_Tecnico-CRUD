@extends('layouts.app')
@section('titulo','Equipos')
@section('contenido')
<div class="topbar">
    <div></div>
    <div>
        <a class="btn btn-primary" href="{{ route('equipos.create') }}">+ Nuevo equipo</a>
    </div>
</div>

<table>
    <thead><tr><th>ID</th><th>Marca</th><th>Modelo/Serial</th><th>Tipo</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $e)
    <tr>
        <td>{{ $e->id }}</td>
        <td>{{ $e->marca->nombre ?? '—' }}</td>
        <td>{{ $e->modelo ?? $e->serial ?? '—' }}</td>
        <td>{{ $e->tipo }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('equipos.show',$e->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('equipos.edit',$e->id) }}">Editar</a>
            <form action="{{ route('equipos.destroy',$e->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Borrar equipo?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="5">No hay equipos</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
