<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcasSeeder extends Seeder
{
    public function run()
    {
        $marcas = [
            ['nombre' => 'Nike'],
            ['nombre' => 'Levi\'s'],
            ['nombre' => 'Zara'],
            ['nombre' => 'H&M'],
        ];

        foreach ($marcas as $marca) {
            Marca::create($marca);
        }
    }
}