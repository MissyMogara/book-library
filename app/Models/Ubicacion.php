<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicaciones';
    protected $fillable = ['biblioteca', 'direccion', 'numero_estanterias'];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
