<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FortuneController;

Route::get('/galleta-fortuna', [FortuneController::class, 'index']);
Route::get('/api/fortuna', [FortuneController::class, 'getFortune']);