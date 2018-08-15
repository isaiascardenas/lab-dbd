<?php

namespace App\Modulos\ReservaVuelo;

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

  public function itinerario()
  {
    return $this->tramos;
  }
}
