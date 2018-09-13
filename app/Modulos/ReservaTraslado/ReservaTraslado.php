<?php

namespace App\Modulos\ReservaTraslado;

use App\Modulos\ReservaTraslado\Traslado;
use Illuminate\Database\Eloquent\Model;

class ReservaTraslado extends Model
{
    protected $table = 'reserva_traslados';

    protected $fillable = [
        'cantidad_pasajeros',
        'fecha_reserva',
        'descuento',
        'costo',
        'traslado_id',
        'orden_compra_id'
    ];

    public function traslado()
    {
        $this->belongsTo(Traslado::class);
    }

    public function ordenCompra()
    {
        $this->belongsTo(OrdenCompra::class);
    }
}
