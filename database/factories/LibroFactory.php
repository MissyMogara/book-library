<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Ubicacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    protected $model = Libro::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagenes = [
            '1.png',
            '2.png',
            '3.png',
            '4.png',
            '5.png',
            '6.png',
            '7.png',
            '8.png',
            '9.png',
            '10.png',
        ];
        return [
            'titulo' => $this->faker->sentence(3),
            'isbn' => $this->faker->isbn13,
            'portada' => $this->faker->randomElement($imagenes),
            'anio_publicacion' => $this->faker->year,
            'estado' => $this->faker->randomElement(['disponible', 'prestado', 'extraviado']),
            // 'autor_id' => Autor::factory(),
            // 'ubicacion_id' => Ubicacion::factory(),
            //  Si lo hago asi entonces me creara 50 autores + 500 autores, se lo agregare despues de la creación.
        ];
    }
}
