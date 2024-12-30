<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OeisController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\BracketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/oeis/index');
});

Route::get('/oeis/index', [OeisController::class, 'index']);

Route::get('/oeis', [OeisController::class, 'index']);

Route::post('/oeis', [OeisController::class, 'calculate']);

Route::get('/ranking', [RankingController::class, 'index']);

Route::post('/ranking', [RankingController::class, 'calculate']);

Route::get('/bracket', [BracketController::class, 'index']); 

Route::post('/bracket', [BracketController::class, 'check']);
