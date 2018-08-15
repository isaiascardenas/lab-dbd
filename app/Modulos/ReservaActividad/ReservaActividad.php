<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Reserva_actividad extends Model
{
	protected $table = 'reserva_actividades';

    protected $fillable = [
        'fecha_reserva',
        'capacidad_ninos',
        'capacidad_adultos',
        'fecha_reserva',
        'descuento',
        'costo',
        'actividad_id',
        'orden_compra_id',
    ];
}
