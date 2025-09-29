@csrf
<label>Clave</label>
<input name="clave" value="{{ old('clave', $registro->clave ?? '') }}" required placeholder="ej: recibido">

<label>Nombre</label>
<input name="nombre" value="{{ old('nombre', $registro->nombre ?? '') }}" required>

<label>Orden (número)</label>
<input name="orden" type="number" value="{{ old('orden', $registro->orden ?? 0) }}">

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('servicio-estados.index') }}">Cancelar</a>
</div>
