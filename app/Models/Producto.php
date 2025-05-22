<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'categoria_id', 'talla_id', 'marca_id', 'tipo_id',
        'precio', 'existencia', 'descuento', 'estado', 'imagen1', 'imagen2', 'imagen3'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public $timestamps=false;
}
