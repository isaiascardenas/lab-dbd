<?php

namespace App;    


use Illuminate\Database\Eloquent\Model;

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

}
