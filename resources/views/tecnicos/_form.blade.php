@csrf

<label>Nombre</label>
<input type="text" name="nombre" value="{{ old('nombre', $registro->nombre ?? '') }}" required>

<label>Email</label>
<input type="email" name="email" value="{{ old('email', $registro->email ?? '') }}">

<label>Teléfono</label>
<input type="text" name="telefono" value="{{ old('telefono', $registro->telefono ?? '') }}">

<div style="display:inline-flex; align-items:center; gap:6px; margin-bottom:10px;">
    <input type="checkbox" name="activo" value="1"
           {{ old('activo', $registro->activo ?? 1) ? 'checked' : '' }}>
    <span>Activo</span>
</div>

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('tecnicos.index') }}">Cancelar</a>
</div>
