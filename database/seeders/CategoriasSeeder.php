<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['nombre' => 'Ropa'],
            ['nombre' => 'Calzado'],
            ['nombre' => 'Accesorios'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}