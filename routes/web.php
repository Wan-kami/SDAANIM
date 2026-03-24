<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UsuarioController;

// Home
Route::get('/', function () {
    return view('welcome');
});

//Panel de Adoptante
Route::get('/index', [AdoptanteController::class, 'index'])->name('adoptante');
Route::get('/quienes', [AdoptanteController::class, 'quienes']);
Route::get('/adopta', [AdoptanteController::class, 'adopta']);

Route::get('/productos', [AdoptanteController::class, 'productos']);
Route::get('/solicitudes', function () {
    return view('adoptante.solicitud');
});


// Panel de voluntario
Route::get('/indexvoluntario', [VoluntarioController::class, 'index'])->name('indexvoluntario');

// Tareas del voluntario
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
Route::get('/tarea/{id}/{accion}', [TareaController::class, 'actualizar'])->name('tarea.actualizar');
Route::post('/tarea/comentar', [TareaController::class, 'comentar'])->name('tarea.comentar');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

