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
});

Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index'])->name('autores');
    Route::get('/create', [AutorController::class, 'create'])->name('autor_create');
    Route::post('/', [AutorController::class, 'store'])->name('autores.store');
    Route::get('/{id}', [AutorController::class, 'show'])->name('autor_detalle');
    Route::delete('/{id}', [AutorController::class, 'destroy'])->name('autores.destroy');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [LibroController::class, 'index'])->name('dashboard');
    Route::get('/create', [LibroController::class, 'create'])->name('libro_create');
    Route::post('/', [LibroController::class, 'store'])->name('libros.store');
    Route::get('/libros/{id}', [LibroController::class, 'show'])->name('libro_detalle');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
});
