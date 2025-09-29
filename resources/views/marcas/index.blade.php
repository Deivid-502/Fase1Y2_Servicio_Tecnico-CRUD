@extends('layouts.app')
@section('titulo','Marcas')
@section('contenido')
<div class="topbar">
    <div></div>
    <div>
        <a class="btn btn-primary" href="{{ route('marcas.create') }}">+ Nueva marca</a>
    </div>
</div>

<table>
    <thead><tr><th>ID</th><th>Nombre</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $m)
    <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->nombre }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('marcas.show',$m->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('marcas.edit',$m->id) }}">Editar</a>
            <form action="{{ route('marcas.destroy',$m->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Borrar marca?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="3">No hay marcas</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
