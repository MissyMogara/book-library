<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    protected $model = Autor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'nacionalidad' => $this->faker->country,
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '-20 years'),
            'biografia' => $this->faker->optional()->paragraphs(3, true),
            'codigoDewey' => $this->faker->numerify('###'),
        ];
    }
}
