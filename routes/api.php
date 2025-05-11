<?php

use App\Http\Controllers\LectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrestamoController;
use App\Http\Middleware\JwtMiddleware;

use function Pest\Laravel\get;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para los libros
Route::get('libros', [LibroController::class, 'index']);
Route::get('libros/{libro}', [LibroController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('libros', [LibroController::class, 'store']);
    Route::put('libros/{libro}', [LibroController::class, 'update']);
    Route::delete('libros/{libro}', [LibroController::class, 'destroy']);
});

// Rutas para los lectores
Route::get('lectores', [LectorController::class, 'index']);
Route::get('lectores/{lector}', [LectorController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('lectores', [LectorController::class, 'store']);
    Route::put('lectores/{lector}', [LectorController::class, 'update']);
    Route::delete('lectores/{lector}', [LectorController::class, 'destroy']);
});

// Rutas para los préstamos
Route::get('Prestamo', [PrestamoController::class, 'index']);
Route::get('Prestamo/{prestamo}', [PrestamoController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('Prestamo', [PrestamoController::class, 'store']);
    Route::put('Prestamo/{Prestamo}', [PrestamoController::class, 'update']);
    Route::delete('Prestamo/{Prestamo}', [PrestamoController::class, 'destroy']);
});

Route::post('/login', [LoginController::class, 'login']);