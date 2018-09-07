<?php

namespace App\Modulos\ReservaVuelo;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vuelo
{
	/**
	 * Array de Tramos
	 */
  private $tramos = [];

  public function __construct($tramosId = [])
  {
  	foreach ($tramosId as $id) {
  		$this->tramos[] = Tramo::find($id);
  	}
  }

  public function origen()
  {
    return $this->tramos[0];
  }

  public function destino()
  {
    return end($this->tramos);
  }

  public function diaPartida()
  {
    return Carbon::parse($this->tramos[0]->fecha_partida)->format('D d-m-Y');
  }

  public function tiempoEscala($arrayIndex)
  {
    $fechaLlegada = Carbon::parse($this->tramos[$arrayIndex-1]->fecha_llegada);
    $fechaPartida = Carbon::parse($this->tramos[$arrayIndex]->fecha_partida);

    $diff = '';

    $diff .= $fechaPartida->diffInHours($fechaLlegada);
    $diff .= 'h';
    $diff .= ' ';
    $diff .= $fechaPartida->diffInMinutes($fechaLlegada);
    $diff .= 'm';

    return $diff;
  }

  public function duracion()
  {
    $fechaPartida = Carbon::parse($this->origen()->fecha_partida);
    $fechaLlegada = Carbon::parse($this->destino()->fecha_llegada);

    return $fechaLlegada->diff($fechaPartida)->format('%Hh %im');
  }

  public function precio($formato = FALSE)
  {
    $precioTotal = 0;
    foreach ($this->itinerario() as $tramo) {
      $precioTotal += $tramo->precio();
    }

    return $formato
              ? '$ '.number_format($precioTotal, 0, ',', '.')
              : $precioTotal;
  }

  public function itinerario()
  {
    return $this->tramos;
  }

  public function numeroEscalas()
  {
    return count($this->tramos);
  }
}
