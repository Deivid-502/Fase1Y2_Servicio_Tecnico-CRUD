@extends('layouts.app')
@section('titulo','Editar cliente')
@section('contenido')
<form action="{{ route('clientes.update',$registro->id) }}" method="POST">
    @method('PUT')
    @include('clientes._form')
</form>
@endsection
