<?php

namespace App\Modulos\ReservaAuto;

use App\Modulos\ReservaAuto\Sucursal;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    protected $table = 'companias';

    protected $fillable = [
        'nombre',
    ];

    public function sucursales()
    {
        return $this->hasMany(Sucursal::class);
    }
}
