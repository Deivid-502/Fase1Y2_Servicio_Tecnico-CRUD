@extends('layouts.app')
@section('titulo','Detalle cliente')
@section('contenido')
<p><strong>Nombre:</strong> {{ $registro->nombre }}</p>
<p><strong>Tel:</strong> {{ $registro->telefono }}</p>
<p><strong>Email:</strong> {{ $registro->email }}</p>
<p><strong>Dirección:</strong> {{ $registro->direccion }}</p>
<p><strong>Documento:</strong> {{ $registro->documento }}</p>
<a class="btn btn-ghost" href="{{ route('clientes.index') }}">Volver</a>
@endsection
