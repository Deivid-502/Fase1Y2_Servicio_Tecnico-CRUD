@extends('layouts.app')
@section('titulo','Editar servicio')
@section('contenido')
<form action="{{ route('servicios.update',$servicio->id) }}" method="POST">
    @method('PUT')
    @include('servicios._form')
</form>
@endsection
