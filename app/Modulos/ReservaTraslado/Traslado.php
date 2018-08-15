<?php

namespace App\Modulos\ReservaTraslado;

use App\ReservaHotel\Hotel;
use App\ReservaVuelo\Aeropuerto;
use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
  protected $table = 'traslados';

  protected $fillable = [
    'tipo',
    'fecha_inicio',
    'fecha_termino',
    'aeropuerto_id',
    'hotel_id'
  ];

  public function aeropuerto()
  {
    $this->belongsTo(Aeropuerto::class);
  }

  public function hotel()
  {
    $this->belongsTo(Hotel::class);
  }

  public function reservas()
  {
    $this->hasMany(ReservaTraslado::class);
  }
}
