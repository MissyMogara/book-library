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
    Route::get('/{id}', [UbicacionController::class, 'show'])->name('ubicacion_detalle');
});

Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index'])->name('autores');
    Route::get('/{id}', [AutorController::class, 'show'])->name('autor_detalle');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [LibroController::class, 'index'])->name('dashboard');
});
