<?php

namespace App\Modulos\ReservaAuto;

use App\Modulos\ReservaAuto\Sucursal;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaAuto\ReservaAuto;

class Auto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patente',
        'modelo',
        'precio_hora',
        'capacidad',
        'id_sucursal',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function reservaAuto()
    {
        return $this->hasMany(ReservaAuto::class);
    }
}
