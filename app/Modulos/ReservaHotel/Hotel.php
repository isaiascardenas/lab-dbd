<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'estrellas',
        'nombre',
        'descripcion',
        'ciudad_id',
    ];

    protected $table = 'hoteles';

    public function habitaciones(){
    	return $this->hasMany(Habitacion::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
