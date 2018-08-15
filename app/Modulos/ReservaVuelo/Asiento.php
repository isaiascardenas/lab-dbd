<?php

namespace App\Modulos\ReservaVuelo;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
  protected $table = 'asientos';

  protected $fillable = [
  	'codigo',
  	'tipo_asiento_id'
  ];

  public function avion()
  {
  	return $this->belongsToMany(Avion::class);
  }

  public function tipoAsiento()
  {
  	return $this->belongsTo(TipoAsiento::class);
  }
}
