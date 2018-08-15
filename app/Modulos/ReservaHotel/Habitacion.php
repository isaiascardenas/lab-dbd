<?php

namespace App\Modulos\ReservaHotel;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';

    protected $fillable = [
        'descripcion',
        'capacidad_nino',
        'capacidad_adulto',
        'precio_por_noche',
        'hotel_id',
    ];


    public function hotel(){
    	return $this->belongsTo(Hotel::class);
    }
    public function reservaHabitaciones(){
    	return $this->hasMany(ReservaHabitacion::class);
    }
}
