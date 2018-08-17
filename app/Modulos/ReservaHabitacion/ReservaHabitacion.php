<?php

namespace App\Modulos\ReservaHabitacion;

            
use Illuminate\Database\Eloquent\Model;

class ReservaHabitacion extends Model
{
    protected $table = 'reserva_habitaciones';

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
