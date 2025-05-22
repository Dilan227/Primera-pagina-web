<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriasSeeder::class,
            MarcasSeeder::class,
            TiposSeeder::class,
            TallasSeeder::class,
            ProductosSeeder::class,
        ]);
    }
}