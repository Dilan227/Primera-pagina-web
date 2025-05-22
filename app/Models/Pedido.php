<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    protected $fillable = ['cliente_id', 'fecha', 'iva', 'descuento', 'total', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_pedidos')
                    ->withPivot('cantidad', 'precio', 'descuento', 'total');
    }
}
