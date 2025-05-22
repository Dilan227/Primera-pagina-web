<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'administradores';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'usuario',
        'contraseña', // Asegúrate de que coincida con la base de datos
        'imagen',
        'rol',
        'estado',
    ];

    protected $hidden = [
        'contraseña', // Asegúrate de que coincida con la base de datos
    ];

    protected $casts = [
        'contraseña' => 'hashed', // Hashear la contraseña automáticamente
    ];
}