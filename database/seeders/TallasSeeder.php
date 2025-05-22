<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Talla;

class TallasSeeder extends Seeder
{
    public function run()
    {
        $tallas = [
            ['nombre' => 'S'],
            ['nombre' => 'M'],
            ['nombre' => 'L'],
            ['nombre' => 'XL'],
            ['nombre' => '42'],
        ];

        foreach ($tallas as $talla) {
            Talla::create($talla);
        }
    }
}