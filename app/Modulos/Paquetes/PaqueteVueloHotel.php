<?php

namespace App\Modulos\Paquetes;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;


class PaqueteVueloHotel extends Model
{
    protected $table = 'paquete_vuelos_hoteles';

    protected $fillable = [

    	'descipcion',
    	'descuento',
    	'reserva_habitacion_id',
    	'orden_compra_id',
    ];

    public function reservaHabitacion(){
    	return $this->hasOne(ReservaHabitacion::class);
    }

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }
}
