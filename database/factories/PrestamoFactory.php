<?php

namespace Database\Factories;

use App\Models\Lector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'lector_id' => Lector::factory(),
            'fecha_devolucion' => $this->faker->optional()->date(),
        ];
    }
}
