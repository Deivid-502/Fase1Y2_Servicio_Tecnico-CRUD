@extends('layouts.app')
@section('titulo','Técnicos')
@section('contenido')
<div class="topbar">
    <div></div>
    <div>
        <a class="btn btn-primary" href="{{ route('tecnicos.create') }}">+ Nuevo técnico</a>
    </div>
</div>

<table>
    <thead><tr><th>ID</th><th>Nombre</th><th>Tel</th><th>Email</th><th>Activo</th><th></th></tr></thead>
    <tbody>
    @forelse($lista as $t)
    <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->nombre }}</td>
        <td>{{ $t->telefono }}</td>
        <td>{{ $t->email }}</td>
        <td>{{ $t->activo ? 'Si':'No' }}</td>
        <td class="actions">
            <a class="btn btn-ghost" href="{{ route('tecnicos.show',$t->id) }}">Ver</a>
            <a class="btn btn-ghost" href="{{ route('tecnicos.edit',$t->id) }}">Editar</a>
            <form action="{{ route('tecnicos.destroy',$t->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Borrar técnico?')">Borrar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="6">No hay técnicos</td></tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top:12px;">{{ $lista->links() }}</div>
@endsection
