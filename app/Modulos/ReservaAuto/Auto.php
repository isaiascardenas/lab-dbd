<?php

namespace App\Modulos\ReservaAuto;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patente'->unique(),
        'modelo',
        'precio_hora',
        'capacidad',
        'id_sucursal',
    ];
}
