<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')
                  ->constrained()  // Si la tabla se llama "pedidos" (convención de Laravel)
                  ->onDelete('cascade');  // <-- Cierra correctamente el paréntesis
        
            $table->foreignId('producto_id')
                  ->constrained()  // Si la tabla se llama "productos"
                  ->onDelete('cascade');
        
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
