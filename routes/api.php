<?php

use App\Http\Controllers\LectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('libros', LibroController::class);

Route::apiResource('lectores', LectorController::class)->parameters([
    'lectores' => 'lector'
]);
