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
        return [
            'titulo' => $this->faker->sentence(3),
            'isbn' => $this->faker->isbn13,
            'portada' => $this->faker->imageUrl(200, 300, 'books', true, 'Faker'),
            'anio_publicacion' => $this->faker->year,
            'estado' => $this->faker->randomElement(['disponible', 'prestado', 'extraviado']),
            'autor_id' => Autor::factory(),
            'ubicacion_id' => Ubicacion::factory(),
        ];
    }
}
