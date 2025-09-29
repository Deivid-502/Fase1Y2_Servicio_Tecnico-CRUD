@extends('layouts.app')
@section('titulo','Detalle historial')
@section('contenido')
<p><strong>Servicio:</strong> {{ $registro->servicio->folio ?? $registro->servicio_id }}</p>
<p><strong>Estado:</strong> {{ $registro->estado->nombre ?? '' }}</p>
<p><strong>Técnico:</strong> {{ $registro->tecnico->nombre ?? '' }}</p>
<p><strong>Fecha:</strong> {{ $registro->fecha_cambio ? \Carbon\Carbon::parse($registro->fecha_cambio)->format('Y-m-d H:i') : '' }}</p>
<p><strong>Nota:</strong><br>{{ $registro->nota }}</p>
<a class="btn btn-ghost" href="{{ route('hist-estados.index') }}">Volver</a>
@endsection
