<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Tramo extends Model
{
    
    public function scopeFilter($query, $filters)
    {

    	// Origen / Destino
    	$query->where('id_aeropuerto_origen', '=', $filters['id_aeropuerto_origen']);
    	$query->where('id_aeropuerto_destino', '=', $filters['id_aeropuerto_destino']);

    	// Fechas
    	$fechaIda = Carbon::createFromFormat('d-m-Y', $filters['fecha_ida']);
    	$query->whereDate('fecha_partida', $fechaIda->format('Y-m-d'));

    	if ($fechaVuelta = Carbon::createFromFormat('d-m-Y', $filters['fecha_vuelta'])) {
    		$query->whereDate('fecha_llegada', $fechaVuelta->format('Y-m-d'));
    	}

    	// Capacidad
    	// $query->join('reserva_asientos', 'reserva_asientos.id_tramo', '=', 'tramos.id');
    	// $query->where();
    	
    	// Tipo Asiento
    	// $query->where();

    }
}
