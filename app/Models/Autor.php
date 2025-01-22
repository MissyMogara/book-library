<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;
    protected $table = 'autores';
    protected $fillable = ['nombre', 'nacionalidad', 'fecha_nacimiento', 'biografia', 'codigoDewey'];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
