<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $fillable = [
        'estrellas',
        'nombre',
        'descripcion',
        'id_locacion',
    ];
}
