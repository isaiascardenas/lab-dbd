<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = [
        'descripcion',
        'capacidad_nino',
        'capacidad_adulto',
        'precio_por_noche',
        'hotel_id',
    ];

    protected $table = 'habitaciones';

    public function hotel(){
    	return $this->belongsTo(Hotel::class);
    }
    public function reservaHotel(){
    	return $this->hasMany(ReservaHotel::class);
    }
}
