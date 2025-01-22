<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    /** @use HasFactory<\Database\Factories\LibroFactory> */
    use HasFactory;
    protected $table = 'libros';
    protected $filleable = ['titulo', 'isbn', 'portada', 'anio_publicacion', 'estado', 'autor_id', 'ubicacion_id'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
