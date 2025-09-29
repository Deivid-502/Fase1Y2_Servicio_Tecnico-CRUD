@extends('layouts.app')
@section('titulo','Detalle técnico')
@section('contenido')
<p><strong>Nombre:</strong> {{ $registro->nombre }}</p>
<p><strong>Email:</strong> {{ $registro->email }}</p>
<p><strong>Tel:</strong> {{ $registro->telefono }}</p>
<p><strong>Activo:</strong> {{ $registro->activo ? 'Si':'No' }}</p>
<a class="btn btn-ghost" href="{{ route('tecnicos.index') }}">Volver</a>
@endsection
