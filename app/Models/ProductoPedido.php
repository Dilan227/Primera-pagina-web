<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPedido extends Model
{
    use HasFactory;
    protected $table = 'productos_pedidos';
    public $incrementing = false; 
    public $timestamps = false; 
    protected $fillable = ['pedido_id', 'producto_id', 'cantidad', 'precio', 'descuento', 'total'];


    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
