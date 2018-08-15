<?php

namespace App\Modulos\ReservaVuelo;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
  protected $table = 'aeropuertos';

	protected $fillable = [
		'codigo',
		'nombre',
		'direccion',
		'ciudad_id'
	];

	public function ciudad()
	{
		return $this->belongsTo(Ciudad::class);
	}

  public function tramos()
  {
    return $this->hasMany(Tramo::class);
  }

  public function traslados()
  {
    return $this->hasMany(Traslado::class); 
  }
}
