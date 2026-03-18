<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AdoptanteController;

Route::get('/index', [AdoptanteController::class, 'index'])->name('adoptante');
Route::get('/quienes', [AdoptanteController::class, 'quienes']);
Route::get('/adopta', [AdoptanteController::class, 'adopta']);