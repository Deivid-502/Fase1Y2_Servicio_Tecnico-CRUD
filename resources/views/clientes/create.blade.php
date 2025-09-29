@extends('layouts.app')
@section('titulo','Crear cliente')
@section('contenido')
@if($errors->any())
<div style="color:#b91c1c;">{{ $errors->first() }}</div>
@endif

<form action="{{ route('clientes.store') }}" method="POST">
    @include('clientes._form')
</form>
@endsection
