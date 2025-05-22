<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    public function run()
    {
        Pedido::create([
            'cliente_id' => 1,
            'fecha' => now(),
            'iva' => 15.00,
            'descuento' => 5.00,
            'total' => 100.00,
            'estado' => 'pendiente'
        ]);

        Pedido::factory(30)->create(); // Si tienes un Factory
    }
}