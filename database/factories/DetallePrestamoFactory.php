<?php

namespace Database\Factories;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallePrestamo>
 */
class DetallePrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prestamo_id'=> Prestamo::factory(),
            'libro_id'=> Libro::factory(),
        ];
    }
}
