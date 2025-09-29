@extends('layouts.app')
@section('titulo','Detalle estado')
@section('contenido')
<p><strong>Clave:</strong> {{ $registro->clave }}</p>
<p><strong>Nombre:</strong> {{ $registro->nombre }}</p>
<p><strong>Orden:</strong> {{ $registro->orden }}</p>
<a class="btn btn-ghost" href="{{ route('servicio-estados.index') }}">Volver</a>
@endsection
