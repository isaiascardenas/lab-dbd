<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAsiento extends Model
{
  protected $table = 'tipo_asientos';

  protected $fillable = [
    'factor_costo',
  	'descripcion'
  ];

  public function asientos()
  {
    return $this->hasMany(Asiento::class);
  }
}
