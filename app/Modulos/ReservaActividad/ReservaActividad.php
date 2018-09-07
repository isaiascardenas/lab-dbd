<?php

namespace App\Modulos\ReservaActividad;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaActividad\Actividad;

class ReservaActividad extends Model
{
    protected $table = 'reserva_actividades';

    protected $fillable = [
        'fecha_reserva',
        'capacidad_ninos',
        'capacidad_adultos',
        'fecha_reserva',
        'descuento',
        'costo',
        'actividad_id',
        'orden_compra_id',
    ];

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function precio($formato = FALSE)
    {
      return $formato
                ? '$ '.number_format($this->costo, 0, ',', '.')
                : $this->costo;
    }
}
