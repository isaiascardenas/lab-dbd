<?php

namespace App\Modulos\ReservaTraslado;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaVuelo\Aeropuerto;


class Traslado extends Model
{
    protected $table = 'traslados';

    protected $fillable = [
        'tipo',
        'fecha_inicio',
        'fecha_termino',
        'capacidad',
        'precio_persona',
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
    public function horaPartida()
    {
        return Carbon::parse($this->fecha_inicio)->format('H:i');
    }

    public function horaLlegada()
    {
        return Carbon::parse($this->fecha_termino)->format('H:i');
    }

    public function stringTipoTraslado()
    {
        if ($this->tipo == 0) {
            return "Aeropuerto -> Hotel";
        }
        else{
            return "Hotel -> Aeropuerto";
        }
    }

    public function reservas()
    {
        return $this->hasMany(ReservaTraslado::class);
    }
}
