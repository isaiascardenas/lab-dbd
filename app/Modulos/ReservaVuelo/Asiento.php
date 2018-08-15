<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
  protected $table = 'asientos';

  protected $fillable = [
  	'codigo',
  	'tipo_asiento_id'
  ];

  // public function avion()
  // {
  // 	return $this->belongsTo(Avion::class);
  // }

  public function tipo()
  {
  	return $this->belongsTo(TipoAsiento::class);
  }
}
