@extends('layouts.app')
@section('titulo','Detalle servicio')
@section('contenido')
<p><strong>Folio:</strong> {{ $servicio->folio }}</p>
<p><strong>Cliente:</strong> {{ $servicio->cliente->nombre ?? '—' }}</p>
<p><strong>Equipo:</strong> {{ $servicio->equipo->modelo ?? $servicio->equipo->serial ?? '—' }}</p>
<p><strong>Técnico:</strong> {{ $servicio->tecnico->nombre ?? '—' }}</p>
<p><strong>Estado:</strong> {{ $servicio->estado->nombre ?? '—' }}</p>
<p><strong>Recibido:</strong> {{ $servicio->fecha_recibido? $servicio->fecha_recibido->format('Y-m-d H:i') : '' }}</p>
<p><strong>Entrega:</strong> {{ $servicio->fecha_entrega? $servicio->fecha_entrega->format('Y-m-d H:i') : '—' }}</p>
<p><strong>Problema informado:</strong><br>{{ $servicio->problema_informado }}</p>
<p><strong>Diagnóstico:</strong><br>{{ $servicio->diagnostico }}</p>
<p><strong>Trabajo realizado:</strong><br>{{ $servicio->trabajo_realizado }}</p>
<p><strong>Precio estimado:</strong> {{ $servicio->precio_estimado }}</p>
<p><strong>Total:</strong> {{ $servicio->total }}</p>

<h3>Historial de estados</h3>
@if($hist->count())
<ul>
    @foreach($hist as $h)
    <li><strong>{{ $h->fecha_cambio ? $h->fecha_cambio->format('Y-m-d H:i') : '' }}</strong> — {{ $h->estado->nombre ?? '' }} @if($h->tecnico) ({{ $h->tecnico->nombre }}) @endif
        <div class="small-muted">{{ $h->nota }}</div>
    </li>
    @endforeach
</ul>
@else
<div class="small-muted">Sin historial</div>
@endif

<a class="btn btn-ghost" href="{{ route('servicios.index') }}">Volver</a>
@endsection
