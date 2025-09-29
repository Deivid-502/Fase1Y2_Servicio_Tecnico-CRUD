@csrf
<label>Marca</label>
<select name="marca_id" required>
    <option value="">-- seleccionar --</option>
    @foreach($marcas as $m)
    <option value="{{ $m->id }}" @selected(old('marca_id', $registro->marca_id ?? '') == $m->id)>{{ $m->nombre }}</option>
    @endforeach
</select>

<label>Serial</label>
<input name="serial" value="{{ old('serial', $registro->serial ?? '') }}">

<label>Modelo</label>
<input name="modelo" value="{{ old('modelo', $registro->modelo ?? '') }}">

<label>Tipo</label>
<input name="tipo" value="{{ old('tipo', $registro->tipo ?? '') }}" placeholder="laptop, smartphone, desktop, impresora">

<label>Observación</label>
<textarea name="observacion">{{ old('observacion', $registro->observacion ?? '') }}</textarea>

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('equipos.index') }}">Cancelar</a>
</div>
