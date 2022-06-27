<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Paises;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';

    protected $fillable = [
        'almacen',
        'pais_id',
        'ciudad_id',
        'direccion',
        'telefono',
        'estado',
        'photo',
    ];

    public function Pais()
    {
        return $this->hasOne(Paises::class, 'id', 'pais_id');
    }
    public function Ciudad()
    {
        return $this->hasOne(Ciudades::class, 'id', 'ciudad_id');
    }
}
