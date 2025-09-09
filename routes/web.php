<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/juegos/memorama',[GamesController::class,'MemoramaGame'])->name('memorama');
