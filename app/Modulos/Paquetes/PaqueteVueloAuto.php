<?php

namespace App\Modulos\Paquetes;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaAuto\ReservaAuto;
use App\Modulos\ReservaVuelo\ReservaBoleto;


class PaqueteVueloAuto extends Model
{
    protected $table = 'paquete_vuelo_autos';

    protected $fillable = [
        'descripcion',
        'descuento',
        'reserva_auto_id',
        'orden_compra_id',
    ];

    /* Relaciones */
    public function reservaAuto()
    {
        return $this->belongsTo(ReservaAuto::class);
    }

    public function reservaBoletos()
    {
        return $this->belongsToMany(ReservaBoleto::class,
            'reserva_paquete_vuelo_autos',
            'paquete_vuelo_auto_id',
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

      $costoTotal += $this->reservaAuto->costo * $this->reservaAuto->descuento;

      return $formato
                ? '$ '.number_format($costoTotal, 0, ',', '.')
                : $costoTotal;
    }

    public function descuentoAplicado()
    {
      return (1 - $this->descuento) * 100 . ' %';
    }
}
