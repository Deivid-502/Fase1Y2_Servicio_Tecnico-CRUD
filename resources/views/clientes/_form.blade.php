@csrf
<label>Nombre</label>
<input name="nombre" value="{{ old('nombre', $registro->nombre ?? '') }}" required>

<label>Teléfono</label>
<input name="telefono" value="{{ old('telefono', $registro->telefono ?? '') }}">

<label>Email</label>
<input name="email" value="{{ old('email', $registro->email ?? '') }}">

<label>Dirección</label>
<input name="direccion" value="{{ old('direccion', $registro->direccion ?? '') }}">

<label>Documento</label>
<input name="documento" value="{{ old('documento', $registro->documento ?? '') }}">

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('clientes.index') }}">Cancelar</a>
</div>
