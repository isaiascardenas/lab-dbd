<?php

namespace App;

use App\User;
use App\ReservaAuto\ReservaAuto;
use App\Paquetes\PaqueteVueloAuto;
use App\Paquetes\PaqueteVueloHotel;
use App\ReservaHotel\ReservaHabitacion;
use App\ReservaTraslado\ReservaTraslado;
use App\ReservaActividad\ReservaActividad;


use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
  protected $table = 'orden_compras';

  protected $fillable = [
    'costo_total',
    'fecha_generado',
    'detalle',
    'user_id'
  ];

  /* Relaciones */

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function reservaTraslado()
  {
    return $this->hasMany(ReservaTraslado::class);
  }

  public function reservaAuto()
  {
    return $this->hasMany(ReservaAuto::class);
  }

  public function reservaActividad()
  {
    return $this->hasMany(ReservaActividad::class);
  }

  public function reservaHabitacion()
  {
    return $this->hasMany(ReservaHabitacion::class);
  }

  public function paqueteVueloHotel()
  {
    return $this->hasMany(PaqueteVueloHotel::class);
  }

  public function paqueteVueloAuto()
  {
    return $this->hasMany(PaqueteVueloAuto::class);
  }
}
