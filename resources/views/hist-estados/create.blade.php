@extends('layouts.app')
@section('titulo','Nuevo historial')
@section('contenido')
<form action="{{ route('hist-estados.store') }}" method="POST">
    @include('hist-estados._form')
</form>
@endsection
