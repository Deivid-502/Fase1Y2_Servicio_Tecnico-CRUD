@extends('layouts.app')
@section('titulo','Crear equipo')
@section('contenido')
<form action="{{ route('equipos.store') }}" method="POST">
    @include('equipos._form')
</form>
@endsection
