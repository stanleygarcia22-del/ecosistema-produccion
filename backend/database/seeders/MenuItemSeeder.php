<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        MenuItem::create([
            'nombre' => 'Ceviche Tropical de Robalo',
            'descripcion' => 'Cubos de robalo fresco marinados en cítricos con mango y maracuyá.',
            'precio' => 14.50,
            'categoria' => 'Entradas',
            'disponible' => true,
        ]);

        MenuItem::create([
            'nombre' => 'Lomo de Aguja en Salsa de Tamarindo',
            'descripcion' => 'Corte fino de res bañado en reducción de tamarindo acompañado de puré rústico.',
            'precio' => 22.00,
            'categoria' => 'Platos Fuertes',
            'disponible' => true,
        ]);

        MenuItem::create([
            'nombre' => 'Volcán de Chocolate Cacao SV',
            'descripcion' => 'Pastel tibio de chocolate nacional con centro fluido y helado de vainilla.',
            'precio' => 8.00,
            'categoria' => 'Postres',
            'disponible' => true,
        ]);
    }
}