@extends('layouts.app')
@section('titulo','Editar estado')
@section('contenido')
<form action="{{ route('servicio-estados.update',$registro->id) }}" method="POST">
    @method('PUT')
    @include('servicio-estados._form')
</form>
@endsection
