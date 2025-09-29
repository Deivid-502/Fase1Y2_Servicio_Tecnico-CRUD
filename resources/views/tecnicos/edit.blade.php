@extends('layouts.app')
@section('titulo','Editar técnico')
@section('contenido')
<form action="{{ route('tecnicos.update',$registro->id) }}" method="POST">
    @method('PUT')
    @include('tecnicos._form')
</form>
@endsection
