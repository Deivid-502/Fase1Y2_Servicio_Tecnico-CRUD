@extends('layouts.app')
@section('titulo','Detalle marca')
@section('contenido')
<p><strong>Nombre:</strong> {{ $registro->nombre }}</p>
<a class="btn btn-ghost" href="{{ route('marcas.index') }}">Volver</a>
@endsection
