<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = [
        'patente'->unique(),
        'modelo',
        'precio_hora',
        'capacidad',
        'id_compania',
    ];
}
