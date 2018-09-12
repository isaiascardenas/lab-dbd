<?php

namespace App\Modulos\ReservaActividad;

use App\Ciudad;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaActividad\ReservaActividad;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'descripcion',
        'max_ninos',
        'max_adultos',
        'costo_nino',
        'costo_adulto',
        'ciudad_id',
    ];

    /* Relaciones */
    public function reservaActividades()
    {
        return $this->hasMany(ReservaActividad::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    /* Funcionalidades */
    public function fechaInicio($format = 'H:i d-m-Y')
    {
      return Carbon::parse($this->fecha_inicio)->format($format);
    }

    public function fechaTermino($format = 'H:i d-m-Y')
    {
      return Carbon::parse($this->fecha_termino)->format($format);
    }

    public function precioNino($formato = FALSE)
    {
      return $formato
                ? '$ '.number_format($this->costo_nino, 0, ',', '.')
                : $this->costo_nino;
    }

    public function precioAdulto($formato = FALSE)
    {
      return $formato
                ? '$ '.number_format($this->costo_adulto, 0, ',', '.')
                : $this->costo_adulto;
    }
}
