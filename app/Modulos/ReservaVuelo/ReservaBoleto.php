<?php

namespace App\Modulos\ReservaVuelo;

use Illuminate\Database\Eloquent\Model;
use App\Modulos\Paquetes\PaqueteVueloAuto;
use App\Modulos\Paquetes\PaqueteVueloHotel;

class ReservaBoleto extends Model
{
    protected $table = 'reserva_boletos';

    protected $fillable = [
        'fecha_reserva',
        'descuento',
        'costo',
        'asiento_avion_id',
        'tramo_id',
        'orden_compra_id'
    ];

    /* Relaciones */
    public function tramo()
    {
        return $this->belongsTo(Tramo::class);
    }

    public function asiento()
    {
        return $this->belongsTo(Avion::class);
    }

    public function paquetesVueloHotel()
    {
        return $this->belongsToMany(PaqueteVueloHotel::class,
            'reserva_paquete_vuelo_hoteles',
            'reserva_boleto_id',
            'paquete_vuelo_hotel_id');
    }

    public function paquetesVueloAuto()
    {
        return $this->belongsToMany(PaqueteVueloAuto::class,
            'reserva_paquete_vuelo_autos',
            'reserva_boleto_id',
            'paquete_vuelo_auto_id');
    }

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }

    public function pasajero()
    {
        return $this->belongsTo(Pasajero::class);
    }
}
