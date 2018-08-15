<?php

namespace App\Modulos\ReservaActividad;    

use App\Ciudad;
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

    public function reservaActividades()
    {
        return $this->hasMany(ReservaActividad::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

} 
