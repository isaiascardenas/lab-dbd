<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaHotel extends Model
{
    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'descuento',
        'id_habitacion',
        'id_orden_compra',
    ];

    protected $table = 'reserva_hoteles';
}
