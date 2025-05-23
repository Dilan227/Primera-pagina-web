<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'apellido', 'correo', 'contraseña', 'direccion', 'imagen', 'estado'];
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }

    public $timestamps=false;
}
