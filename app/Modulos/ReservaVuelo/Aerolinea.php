<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
  protected $table = 'aerolineas';

  protected $fillable = [
  	'nombre'
  ];

  public function aviones()
  {
    return $this->hasMany(Avion::class);
  }
}
