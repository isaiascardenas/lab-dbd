<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'estrellas',
        'nombre',
        'descripcion',
        'id_locacion',
    ];

    protected $table = 'hoteles';
}
