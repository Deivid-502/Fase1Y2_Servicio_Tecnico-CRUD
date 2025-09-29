@extends('layouts.app')
@section('titulo','Editar equipo')
@section('contenido')
<form action="{{ route('equipos.update',$registro->id) }}" method="POST">
    @method('PUT')
    @include('equipos._form')
</form>
@endsection
