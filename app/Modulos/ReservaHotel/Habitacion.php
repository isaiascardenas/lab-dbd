<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = [
        'descripcion',
        'capacidad_nino',
        'capacidad_adulto',
        'precio_por_noche',
        'id_hotel',
    ];

    protected $table = 'habitaciones';
}
