<?php

namespace App\Modulos\ReservaHabitacion;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\Paquetes\PaqueteVueloHotel;

use App\OrdenCompra;

class ReservaHabitacion extends Model
{
    protected $table = 'reserva_habitaciones';

    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'fecha_reserva',
        'costo',
        'descuento',
        'habitacion_id',
        'orden_compra_id',
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }

    public function paqueteVueloHotel()
    {
        return $this->hasOne(PaqueteVueloHotel::class, 'reserva_habitacion_id');
    }

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }

    public function precio($formato = FALSE)
    {
      return $formato
                ? '$ '.number_format($this->costo, 0, ',', '.')
                : $this->costo;
    }

    public function fechaInicio($format = 'H:i d-m-Y')
    {
      return Carbon::parse($this->fecha_inicio)->format($format);
    }

    public function fechaTermino($format = 'H:i d-m-Y')
    {
      return Carbon::parse($this->fecha_termino)->format($format);
    }
}
