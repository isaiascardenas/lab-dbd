<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaqueteVueloAuto extends Model
{
    protected $table = 'paquete_vuelos_autos';

    protected $fillable = [

    	'descipcion',
    	'descuento',
    	'reserva_auto_id',
    	'orden_compra_id',
    ];

    public function reservaAuto(){
    	return $this->hasOne(ReservaAuto::class);
    }
}
