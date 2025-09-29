@extends('layouts.app')
@section('titulo','Crear marca')
@section('contenido')
<form action="{{ route('marcas.store') }}" method="POST">
    @include('marcas._form')
</form>
@endsection
