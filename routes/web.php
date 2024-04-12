<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/demo', [UserController::class, 'show']);
Route::get('/colorGame', [UserController::class, 'color']);
Route::get('/rashi', [UserController::class, 'rashi']);
Route::get('/numbergame', [UserController::class, 'numbergame']);