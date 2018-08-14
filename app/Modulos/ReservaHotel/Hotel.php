<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'estrellas',
        'nombre',
        'descripcion',
        'localizacion_id',
    ];

    protected $table = 'hoteles';

    public function habitaciones(){
    	return $this->hasMany(Habitacion::class);
    }
}
