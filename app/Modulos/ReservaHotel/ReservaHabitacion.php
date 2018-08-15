<?php

namespace App\Modulos\ReservaHotel;

            
use Illuminate\Database\Eloquent\Model;

class ReservaHotel extends Model
{
    protected $table = 'reserva_hoteles';

    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'fecha_reserva',
        'costo',
        'descuento',
        'habitacion_id',
        'orden_compra_id',
    ];

    public function habitacion(){
    	return $this->belongsTo(Habitacion::class);
    }
    
    public function ordenCompra(){
		return $this->belongsTo(OrdenCompra::class);
    }
    
}
