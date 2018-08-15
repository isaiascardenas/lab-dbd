<?php

namespace App\Modulos\ReservaAuto;

use App\Modulos\ReservaAuto\Sucursal;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    public function sucursales()
    {
        return $this->hasMany(Sucursal::class);
    }
}
