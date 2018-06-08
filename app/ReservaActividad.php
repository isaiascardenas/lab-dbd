<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva_actividad extends Model
{
    protected $fillable = [
        'fecha_reserva',
        'capacidad_ninos',
        'capacidad_adultos',
        'id_actividad',
        'id_orden_compra',
    ];
}
