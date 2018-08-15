<?php

namespace App\Modulos\ReservaAuto;

use App\Modulos\ReservaAuto\Auto;
use Illuminate\Database\Eloquent\Model;

class ReservaAuto extends Model
{
    protected $table = 'reserva_autos';

    protected $fillable = [
        'fecha_inicio',
        'fecha_termino',
        'fecha_reserva',
        'descuento',
        'costo',
        'auto_id',
        'orden_compra_id',
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
}
