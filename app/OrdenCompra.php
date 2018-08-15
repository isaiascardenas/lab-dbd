<?php

namespace App;

use App\User;
use App\ReservaAuto\ReservaAuto;
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
    $this->belongsTo(User::class);
  }

  public function reservaTraslado()
  {
    $this->hasMany(ReservaTraslado::class);
  }

  public function reservaAuto()
  {
    $this->hasMany(ReservaAuto::class);
  }

  public function reservaActividad()
  {
    $this->hasMany(ReservaActividad::class);
  }

  public function reservaHabitacion()
  {
    $this->hasMany(ReservaHabitacion::class);
  }
}
