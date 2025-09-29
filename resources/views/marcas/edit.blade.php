@extends('layouts.app')
@section('titulo','Editar marca')
@section('contenido')
<form action="{{ route('marcas.update',$registro->id) }}" method="POST">
    @method('PUT')
    @include('marcas._form')
</form>
@endsection
