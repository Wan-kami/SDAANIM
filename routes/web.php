<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoluntarioController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UsuarioController;

Route::get('/index', [AdoptanteController::class, 'index'])->name('adoptante');
Route::get('/quienes', [AdoptanteController::class, 'quienes']);
Route::get('/adopta', [AdoptanteController::class, 'adopta']);

Route::get('/productos', [AdoptanteController::class, 'productos']);
Route::get('/solicitudes', function () {
    return view('adoptante.solicitud');
});


Route::get('/indexvoluntario', [VoluntarioController::class, 'indexvoluntario'])->name('indexvoluntario');
