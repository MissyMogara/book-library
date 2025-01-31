<?php

use Illuminate\Support\Facades\Route;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Ubicacion;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\UbicacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('ubicaciones')->group(function () {
    Route::get('/', [UbicacionController::class, 'index'])->name('ubicaciones');
    Route::get('/create', [UbicacionController::class, 'create'])->name('ubicacion_create');
    Route::post('/', [UbicacionController::class, 'store'])->name('ubicaciones.store');
    Route::get('/{id}', [UbicacionController::class, 'show'])->name('ubicacion_detalle');
    Route::delete('/{id}', [UbicacionController::class, 'destroy'])->name('ubicaciones.destroy');
    Route::get('/{id}/edit', [UbicacionController::class, 'edit'])->name('ubicaciones.edit');
    Route::put('/{id}', [UbicacionController::class, 'update'])->name('ubicaciones.update');
});

Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index'])->name('autores');
    Route::get('/create', [AutorController::class, 'create'])->name('autor_create');
    Route::get('/buscar', [AutorController::class, 'buscar'])->name('autores.buscar');
    Route::post('/', [AutorController::class, 'store'])->name('autores.store');
    Route::get('/{id}', [AutorController::class, 'show'])->name('autor_detalle');
    Route::delete('/{id}', [AutorController::class, 'destroy'])->name('autores.destroy');
    Route::get('/{id}/edit', [AutorController::class, 'edit'])->name('autores.edit');
    Route::put('/{id}', [AutorController::class, 'update'])->name('autores.update');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [LibroController::class, 'index'])->name('dashboard');
    Route::get('/create', [LibroController::class, 'create'])->name('libro_create');
    Route::get('/buscar', [LibroController::class, 'buscar'])->name('libros.buscar');
    Route::post('/', [LibroController::class, 'store'])->name('libros.store');
    Route::get('/libros/{id}', [LibroController::class, 'show'])->name('libro_detalle');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
    Route::get('/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/{id}', [LibroController::class, 'update'])->name('libros.update');
});

Route::prefix('api/v1')->group(function () {
    Route::get('/libros', [LibroController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/libros', [LibroController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/libros/{id}', [LibroController::class, 'show'])->middleware('auth:sanctum');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->middleware('auth:sanctum');
});
