<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TiposSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            ['nombre' => 'Camisetas'],
            ['nombre' => 'Jeans'],
            ['nombre' => 'Chaquetas'],
            ['nombre' => 'Vestidos'],
            ['nombre' => 'Zapatillas'],
        ];

        foreach ($tipos as $tipo) {
            Tipo::create($tipo);
        }
    }
}