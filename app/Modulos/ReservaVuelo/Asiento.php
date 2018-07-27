<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $fillable = [
    	'costo',
    	'codigo_asiento',
    	'tipo_asiento_id',
    	'avion_id'
    ];

    public function avion()
    {
    	return $this->belongsTo(Avion::class);
    }

    public function tipo()
    {
    	return $this->belongsTo(TipoAsiento::class);
    }

    public function disponible($tramo_id)
    {
    	$reservas = $this->hasMany(ReservaAsiento::class)->where('tramo_id', '=', $tramo_id)->count();

    	return ($reservas == 0);
    }
}
