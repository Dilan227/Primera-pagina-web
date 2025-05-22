<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan@example.com',
            'contraseña' => bcrypt('password'),
            'direccion' => 'Calle Falsa 123',
            'estado' => 'activo'
        ]);

        Cliente::factory(20)->create(); // Si tienes un Factory
    }
}
