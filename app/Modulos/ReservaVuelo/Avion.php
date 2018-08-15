<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
	protected $table = 'aviones';

	protected $fillable = [
		'modelo',
		'aerolinea_id'
	];

  public function asientos()
  {
  	return $this->hasMany(Asiento::class);
  }

  public function tramos()
  {
  	return $this->hasMany(Tramo::class);
  }

  public function aerolinea()
  {
  	return $this->belongsTo(Aerolinea::class);
  }
}
