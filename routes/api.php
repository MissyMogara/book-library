<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // Route::post('/login', [APIController::class, 'login']);
    Route::get('/libros', [APIController::class, 'libros']);
    Route::get('/autores', [APIController::class, 'autores']);
    Route::get('/libros/{isbn}', [APIController::class, 'librosByIsbn']);
    Route::get('/libros/autor/{autor_id}', [APIController::class, 'librosByAutor']);
    Route::post('/libros', [APIController::class, 'store']);
    Route::delete('/libros/{isbn}', [APIController::class, 'destroy']);
});
