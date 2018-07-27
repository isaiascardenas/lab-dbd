<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
	protected $fillable = [
		'codigo',
		'nombre',
		'direccion',
		'localizacion_id'
	];

	public function localizacion()
	{
		return $this->belongsTo(Localizacion::class);
	}
}
