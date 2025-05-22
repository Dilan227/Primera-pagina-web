<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

public function run()
{
    // Verificar si el usuario ya existe
    $usuarioExistente = Administrador::where('usuario', 'admin')->first();
    if ($usuarioExistente) {
        return;
    }

    // Crear el usuario base
    Administrador::create([
        'nombre' => 'Admin',
        'apellido' => 'Base',
        'correo' => 'admin@example.com',
        'usuario' => 'admin',
        'contraseña' => Hash::make('admin123'),
        'imagen' => 'Tienda_ropa/public/storage/administradores/admin_default.jpg',
        'rol' => 'admin',
        'estado' => 'activo',
    ]);
}