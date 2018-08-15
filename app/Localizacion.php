<?php

namespace App;

use App\Modulos\ReservaAuto\Sucursal;
use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    protected $table = 'localizaciones';

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
