@csrf
<label>Servicio</label>
<select name="servicio_id" required>
    <option value="">-- seleccionar --</option>
    @foreach($servicios as $s)
    <option value="{{ $s->id }}" @selected(old('servicio_id', $registro->servicio_id ?? '') == $s->id)>{{ $s->folio }}</option>
    @endforeach
</select>

<label>Estado</label>
<select name="estado_id" required>
    <option value="">-- seleccionar --</option>
    @foreach($estados as $e)
    <option value="{{ $e->id }}" @selected(old('estado_id', $registro->estado_id ?? '') == $e->id)>{{ $e->nombre }}</option>
    @endforeach
</select>

<label>Técnico (opcional)</label>
<select name="cambiado_por_tecnico_id">
    <option value="">-- ninguno --</option>
    @foreach($tecnicos as $t)
    <option value="{{ $t->id }}" @selected(old('cambiado_por_tecnico_id', $registro->cambiado_por_tecnico_id ?? '') == $t->id)>{{ $t->nombre }}</option>
    @endforeach
</select>

<label>Fecha cambio</label>
<input name="fecha_cambio" type="datetime-local" value="{{ old('fecha_cambio', isset($registro->fecha_cambio) ? \Carbon\Carbon::parse($registro->fecha_cambio)->format('Y-m-d\TH:i') : '') }}">

<label>Nota</label>
<textarea name="nota">{{ old('nota', $registro->nota ?? '') }}</textarea>

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('hist-estados.index') }}">Cancelar</a>
</div>
