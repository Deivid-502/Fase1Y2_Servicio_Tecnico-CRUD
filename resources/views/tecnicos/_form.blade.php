@csrf
<label>Nombre</label>
<input name="nombre" value="{{ old('nombre', $registro->nombre ?? '') }}" required>

<label>Email</label>
<input name="email" value="{{ old('email', $registro->email ?? '') }}">

<label>Teléfono</label>
<input name="telefono" value="{{ old('telefono', $registro->telefono ?? '') }}">

<label><input type="checkbox" name="activo" value="1" @checked(old('activo', $registro->activo ?? true))> Activo</label>

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('tecnicos.index') }}">Cancelar</a>
</div>
