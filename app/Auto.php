<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = [
        'patente',
        'modelo',
        'precio_hora',
        'capacidad',
        'id_compania',
    ];
}
