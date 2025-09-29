@extends('layouts.app')
@section('titulo','Detalle equipo')
@section('contenido')
<p><strong>Marca:</strong> {{ $registro->marca->nombre ?? '—' }}</p>
<p><strong>Serial:</strong> {{ $registro->serial }}</p>
<p><strong>Modelo:</strong> {{ $registro->modelo }}</p>
<p><strong>Tipo:</strong> {{ $registro->tipo }}</p>
<p><strong>Observación:</strong> {{ $registro->observacion }}</p>
<a class="btn btn-ghost" href="{{ route('equipos.index') }}">Volver</a>
@endsection
