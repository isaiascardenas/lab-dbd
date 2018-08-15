<?php

namespace App\Modulos\ReservaHotel;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHotel\Habitacion;
use App\Modulos\ReservaTraslado\Traslado;

class Hotel extends Model
{
    protected $table = 'hoteles';

    protected $fillable = [
        'estrellas',
        'nombre',
        'descripcion',
        'ciudad_id',
    ];


    public function habitaciones(){
    	return $this->hasMany(Habitacion::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    public function traslado(){
        return $this->belongsTo(Traslado::class);
    }
}
