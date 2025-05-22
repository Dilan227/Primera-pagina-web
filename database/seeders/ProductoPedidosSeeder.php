<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductoPedido;

class ProductoPedidosSeeder extends Seeder
{
    public function run()
    {
        ProductoPedido::create([
            'pedido_id' => 1,
            'producto_id' => 1,
            'cantidad' => 2,
            'precio' => 19.99,
            'descuento' => 0,
            'total' => 39.98
        ]);

        ProductoPedido::factory(50)->create(); // Si tienes un Factory
    }
}