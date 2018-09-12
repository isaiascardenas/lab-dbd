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
}
