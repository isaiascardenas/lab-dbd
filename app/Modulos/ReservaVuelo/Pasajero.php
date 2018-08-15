<?php

namespace App\Modulos\ReservaVuelo;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
  protected $table = 'pasajeros';

  protected $fillable = [
    'nombre',
    'rut',
    'reserva_boleto_id'
  ];

  /* Relaciones */
  public function reserva()
  {
    return $this->hasOne(ReservaBoleto::class);
  }
}
