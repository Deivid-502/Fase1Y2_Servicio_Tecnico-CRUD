@extends('layouts.app')
@section('titulo','Clientes')
@section('contenido')
<div class="topbar">
    <div></div>
    <div>
        <a class="btn btn-primary" href="{{ route('clientes.create') }}">+ Nuevo cliente</a>
    </div>
</div>

<table>
    <thead><tr><th>ID</th><th>Nombre</th><th>Tel</th><th>Email</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->nombre }}</td>
        <td>{{ $c->telefono }}</td>
        <td>{{ $c->email }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('clientes.show',$c->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('clientes.edit',$c->id) }}">Editar</a>
            <form action="{{ route('clientes.destroy',$c->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Seguro que quieres borrar?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="5">No hay clientes</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
