<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
