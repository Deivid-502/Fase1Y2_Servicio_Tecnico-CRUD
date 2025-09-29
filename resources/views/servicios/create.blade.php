@extends('layouts.app')
@section('titulo','Crear servicio')
@section('contenido')
@if($errors->any())
<div style="color:#b91c1c;">{{ $errors->first() }}</div>
@endif

<form action="{{ route('servicios.store') }}" method="POST">
    @include('servicios._form')
</form>
@endsection
