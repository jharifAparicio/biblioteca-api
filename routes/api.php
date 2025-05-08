<?php

use App\Http\Controllers\LectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\JwtMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(JwtMiddleware::class)->apiResource('libros', LibroController::class);

Route::apiResource('lectores', LectorController::class)->parameters([
    'lectores' => 'lector'
]);

Route::post('/login', [LoginController::class, 'login']);