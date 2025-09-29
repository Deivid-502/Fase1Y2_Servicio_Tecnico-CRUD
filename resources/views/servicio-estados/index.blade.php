@extends('layouts.app')
@section('titulo','Estados de servicio')
@section('contenido')
<div class="topbar">
    <div></div>
    <div>
        <a class="btn btn-primary" href="{{ route('servicio-estados.create') }}">+ Nuevo estado</a>
    </div>
</div>

<table>
    <thead><tr><th>ID</th><th>Clave</th><th>Nombre</th><th>Orden</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $e)
    <tr>
        <td>{{ $e->id }}</td>
        <td>{{ $e->clave }}</td>
        <td>{{ $e->nombre }}</td>
        <td>{{ $e->orden }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('servicio-estados.show',$e->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('servicio-estados.edit',$e->id) }}">Editar</a>
            <form action="{{ route('servicio-estados.destroy',$e->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Borrar estado?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="5">No hay estados</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
