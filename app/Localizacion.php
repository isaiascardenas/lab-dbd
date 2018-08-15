<?php

namespace App;

use App\Modulos\ReservaAuto\Sucursal;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHotel\Hotel;

class Localizacion extends Model
{
    protected $table = 'localizaciones';

    protected $fillable = [
        'pais',
        'ciudad'
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function hoteles()
    {
        return $this->hasMany(Hotel::class);
    }
}
