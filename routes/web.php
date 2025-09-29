<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteCtrl;
use App\Http\Controllers\TecnicoCtrl;
use App\Http\Controllers\MarcaCtrl;
use App\Http\Controllers\EquipoCtrl;
use App\Http\Controllers\ServicioCtrl;
use App\Http\Controllers\EstadoServicioCtrl;
use App\Http\Controllers\HistEstadoCtrl;

Route::get('/', function () {
    return redirect()->route('servicios.index');
});

Route::resource('clientes', ClienteCtrl::class);
Route::resource('tecnicos', TecnicoCtrl::class);
Route::resource('marcas', MarcaCtrl::class);
Route::resource('equipos', EquipoCtrl::class);
Route::resource('servicios', ServicioCtrl::class);
Route::resource('servicio-estados', EstadoServicioCtrl::class);
Route::resource('hist-estados', HistEstadoCtrl::class);
