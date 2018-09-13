<?php

namespace App\Modulos\Paquetes;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaVuelo\ReservaBoleto;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;


class PaqueteVueloHotel extends Model
{
    protected $table = 'paquete_vuelo_hoteles';

    protected $fillable = [
        'descripcion',
        'descuento',
        'reserva_habitacion_id',
        'orden_compra_id',
    ];

    /* Relaciones */
    public function reservaHabitacion()
    {
        return $this->belongsTo(ReservaHabitacion::class);
    }

    public function reservaBoletos()
    {
        return $this->belongsToMany(ReservaBoleto::class,
            'reserva_paquete_vuelo_hoteles',
            'paquete_vuelo_hotel_id',
            'reserva_boleto_id');
    }

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }

    /* Funcionalidades */
    public function precio($formato = FALSE)
    {
      $costoTotal = 0;

      foreach ($this->reservaBoletos as $reserva) {
        $costoTotal += $reserva->costo * $reserva->descuento;
      }

      $costoTotal += $this->reservaHabitacion->costo * $this->reservaHabitacion->descuento;

      return $formato
                ? '$ '.number_format($costoTotal, 0, ',', '.')
                : $costoTotal;
    }

    public function descuentoAplicado()
    {
      return (1 - $this->descuento) * 100 . ' %';
    }
}
