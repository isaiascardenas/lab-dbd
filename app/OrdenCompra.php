<?php

namespace App;

use App\User;
use App\Modulos\ReservaAuto\ReservaAuto;
use App\Modulos\Paquetes\PaqueteVueloAuto;
use App\Modulos\Paquetes\PaqueteVueloHotel;
use App\Modulos\ReservaTraslado\ReservaTraslado;
use App\Modulos\ReservaActividad\ReservaActividad;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;
use App\Modulos\ReservaVuelo\ReservaBoleto;

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

  public function reservaBoleto()
  {
    return $this->hasMany(ReservaBoleto::class);
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
