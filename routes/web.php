<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;

//login page to be hit at first
Route::get('/', [UserController::class, 'form']);
Route::get('/login', [UserController::class, 'login']); 
Route::get('/demo', [UserController::class, 'show']);
Route::get('/colorGame', [UserController::class, 'color']);
Route::get('/rashi', [UserController::class, 'rashi']);
Route::get('/numbergame', [UserController::class, 'numbergame']);


Route::post('/submitAmount', [GameController::class, 'submitAmount']);
Route::post('/fetchNumberBetResult', [GameController::class, 'fetchNumberBetResult']);