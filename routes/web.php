<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\TareaController;

// Home
Route::get('/', function () {
    return view('welcome');
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