<?php

use Illuminate\Support\Facades\Route;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Ubicacion;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('autores')->group(function () {
    //
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        $libros = Libro::with(['autor', 'ubicacion'])->get();

        $autores = Autor::all();
        $ubicaciones = Ubicacion::all();

        return view('dashboard', compact('libros', 'autores', 'ubicaciones'));
    });
});
