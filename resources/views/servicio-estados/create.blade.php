@extends('layouts.app')
@section('titulo','Crear estado')
@section('contenido')
<form action="{{ route('servicio-estados.store') }}" method="POST">
    @include('servicio-estados._form')
</form>
@endsection
