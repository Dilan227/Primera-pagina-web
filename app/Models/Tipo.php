<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];


    public function productos()
    {
        return $this->hasMany(Producto::class, 'tipo_id');
    }
}
