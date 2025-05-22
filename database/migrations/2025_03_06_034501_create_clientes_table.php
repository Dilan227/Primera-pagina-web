<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Desactivar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        // Crear la tabla de clientes
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->text('direccion')->nullable();
            $table->string('imagen')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->string('google_id')->nullable()->unique();
            $table->string('google_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Reactivar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

    public function down(): void
    {
        // Desactivar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Eliminar la tabla de clientes
        Schema::dropIfExists('clientes');

        // Reactivar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
};

