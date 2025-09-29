@csrf
<label>Nombre</label>
<input name="nombre" value="{{ old('nombre', $registro->nombre ?? '') }}" required>

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('marcas.index') }}">Cancelar</a>
</div>
