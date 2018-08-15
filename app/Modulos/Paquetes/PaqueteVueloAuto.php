<?php

namespace App\Modulos\Paquetes;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;

class PaqueteVueloAuto extends Model
{
    protected $table = 'paquete_vuelos_autos';

    protected $fillable = [

    	'descripcion',
    	'descuento',
    	'reserva_auto_id',
    	'orden_compra_id',
    ];

    public function reservaAuto(){
    	return $this->hasOne(ReservaAuto::class);
    }

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }
}
