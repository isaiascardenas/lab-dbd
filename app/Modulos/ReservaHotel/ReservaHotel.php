<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaHotel extends Model
{
    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'descuento',
        'habitacion_id',
        'orden_compra_id',
    ];

    protected $table = 'reserva_hoteles';

    public function habitaciones(){
    	return $this->belongsTo(Habitacion::class);
    }
    /*
    public funcion ordenCompra(){
		return $this->belongsTo(OrdenCompra::class);
    }
    */
}
