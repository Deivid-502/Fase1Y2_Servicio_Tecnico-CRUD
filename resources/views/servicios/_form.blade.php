@csrf
<label>Folio</label>
<input name="folio" value="{{ old('folio', $servicio->folio ?? '') }}" required>

<label>Cliente</label>
<select name="cliente_id" required>
    <option value="">-- seleccionar --</option>
    @foreach($clientes as $c)
    <option value="{{ $c->id }}" @selected(old('cliente_id', $servicio->cliente_id ?? '') == $c->id)>{{ $c->nombre }}</option>
    @endforeach
</select>

<label>Equipo</label>
<select name="equipo_id" required>
    <option value="">-- seleccionar --</option>
    @foreach($equipos as $e)
    <option value="{{ $e->id }}" @selected(old('equipo_id', $servicio->equipo_id ?? '') == $e->id)>{{ $e->marca->nombre ?? 'Marca' }} - {{ $e->modelo ?? $e->serial ?? 'Equipo' }}</option>
    @endforeach
</select>

<label>Técnico (opcional)</label>
<select name="tecnico_id">
    <option value="">-- no asignado --</option>
    @foreach($tecnicos as $t)
    <option value="{{ $t->id }}" @selected(old('tecnico_id', $servicio->tecnico_id ?? '') == $t->id)>{{ $t->nombre }}</option>
    @endforeach
</select>

<label>Estado</label>
<select name="estado_actual_id" required>
    <option value="">-- seleccionar --</option>
    @foreach($estados as $es)
    <option value="{{ $es->id }}" @selected(old('estado_actual_id', $servicio->estado_actual_id ?? '') == $es->id)>{{ $es->nombre }}</option>
    @endforeach
</select>

<label>Fecha recibido</label>
<input name="fecha_recibido" type="datetime-local" value="{{ old('fecha_recibido', isset($servicio->fecha_recibido) ? $servicio->fecha_recibido->format('Y-m-d\TH:i') : '') }}" required>

<label>Fecha entrega (opcional)</label>
<input name="fecha_entrega" type="datetime-local" value="{{ old('fecha_entrega', isset($servicio->fecha_entrega) && $servicio->fecha_entrega ? $servicio->fecha_entrega->format('Y-m-d\TH:i') : '') }}">

<label>Problema informado</label>
<textarea name="problema_informado" required>{{ old('problema_informado', $servicio->problema_informado ?? '') }}</textarea>

<label>Diagnóstico</label>
<textarea name="diagnostico">{{ old('diagnostico', $servicio->diagnostico ?? '') }}</textarea>

<label>Trabajo realizado</label>
<textarea name="trabajo_realizado">{{ old('trabajo_realizado', $servicio->trabajo_realizado ?? '') }}</textarea>

<label>Precio estimado</label>
<input name="precio_estimado" type="number" step="0.01" value="{{ old('precio_estimado', $servicio->precio_estimado ?? '') }}">

<label>Total</label>
<input name="total" type="number" step="0.01" value="{{ old('total', $servicio->total ?? '') }}">

<div style="display:flex; gap:8px;">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <a class="btn btn-ghost" href="{{ route('servicios.index') }}">Cancelar</a>
</div>
