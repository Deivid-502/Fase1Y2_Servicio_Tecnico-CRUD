@extends('layouts.app')
@section('titulo','Editar historial')
@section('contenido')
<form action="{{ route('hist-estados.update',$registro->id) }}" method="POST">
    @method('PUT')
    @include('hist-estados._form')
</form>
@endsection
