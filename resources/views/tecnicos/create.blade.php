@extends('layouts.app')
@section('titulo','Crear técnico')
@section('contenido')
@if($errors->any())
<div style="color:#b91c1c;">{{ $errors->first() }}</div>
@endif

<form action="{{ route('tecnicos.store') }}" method="POST">
    @include('tecnicos._form')
</form>
@endsection
