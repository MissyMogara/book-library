<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('autores')->group(function () {
    //
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
});
