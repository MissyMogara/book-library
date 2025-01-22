<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ubicacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ubicacion>
 */
class UbicacionFactory extends Factory
{
    protected $model = Ubicacion::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biblioteca' => $this->faker->company . ' Library',
            'direccion' => $this->faker->address,
            'numero_estanterias' => $this->faker->numberBetween(1, 50),
        ];
    }
}
