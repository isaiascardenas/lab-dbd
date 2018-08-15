<?php

namespace App\Modulos\ReservaAuto;

use App\Localizacion;
use App\Modulos\ReservaAuto\Auto;
use App\Modulos\ReservaAuto\Compania;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_compania',
        'id_localizacion',
    ];

    protected $table = 'sucursales';

    public function autos()
    {
        return $this->hasMany(Auto::class);
    }

    public function compania()
    {
        return $this->belongsTo(Compania::class);
    }

    public function localizacion()
    {
        return $this->localizacion('App\Phone');
    }
}
