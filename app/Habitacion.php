<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class habitacion extends Model
{
    protected $fillable = [
        'descripcion',
        'capacidad_nino',
        'capacidad_adulto',
        'precio_por_noche',
        'id_hotel',
    ];
}
