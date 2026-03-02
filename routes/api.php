<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TokenValid;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\scoreController;
use App\Http\Controllers\Api\LogoutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'TokenValid',
    'prefix' => 'auth'
], function ($router) {});

Route::apiResource('/scores', App\Http\Controllers\Api\scoreController::class)->middleware('TokenValid');
Route::post('/register', App\Http\Controllers\Api\RegisterController::class);
Route::post('/login', App\Http\Controllers\Api\LoginController::class);
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class);