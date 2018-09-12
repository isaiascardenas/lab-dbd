<?php

namespace App\Modulos\ReservaTraslado;

use App\ReservaVuelo\Aeropuerto;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHabitacion\Hotel;


class Traslado extends Model
{
    protected $table = 'traslados';

    protected $fillable = [
        'tipo',
        'fecha_inicio',
        'fecha_termino',
        'capacidad',
        'aeropuerto_id',
        'hotel_id'
    ];

    public function aeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservas()
    {
        return $this->hasMany(ReservaTraslado::class);
    }
}
