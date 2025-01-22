<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Ubicacion;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libro::factory()->count(500)->create()->each(function ($libro) {
            //  Le actualizo los autores a los libros de forma aleatoria, por defecto es el 1 para todos.
            $autor = Autor::inRandomOrder()->first();

            $ubicacion = Ubicacion::inRandomOrder()->first();

            $libro->update([
                'autor_id' => $autor->id,
                'ubicacion_id' => $ubicacion->id,
            ]);
        });
    }
}
