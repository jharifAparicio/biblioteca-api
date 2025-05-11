<?php

namespace Database\Seeders;

use App\Models\DetallePrestamo;
use App\Models\Prestamo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestamo::factory()
        ->count(20)
        ->has(DetallePrestamo::factory()->count(3), 'detalles')
        ->create();
    }
}
