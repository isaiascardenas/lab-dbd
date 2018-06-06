<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservaHotel extends Model
{
    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'descuento',
        'id_habitacion',
        'id_orden_compra',
    ];
}
