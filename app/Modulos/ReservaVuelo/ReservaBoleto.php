<?php

namespace App\Modulos\ReservaVuelo;

use Illuminate\Database\Eloquent\Model;

class ReservaBoleto extends Model
{
  protected $table = 'reserva_boletos';

  protected $fillable = [
    'fecha_reserva',
    'descuento',
    'costo',
    'avion_asiento_id',
    'tramo_id',
    'orden_compra_id'
  ];

  /* Relaciones */
  public function tramo()
  {
    $this->belongsTo(Tramo::class);
  }

  // public function asiento()
  // {
  //   $this->belongsTo(Avion::class);
  // }

  public function ordenCompra()
  {
    $this->belongsTo(OrdenCompra::class);
  }
}
