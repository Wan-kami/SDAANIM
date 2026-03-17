<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AdoptanteController;

Route::get('/adoptante', [AdoptanteController::class, 'index'])->name('adoptante');
