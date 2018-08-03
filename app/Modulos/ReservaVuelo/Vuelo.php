<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo
{
	/**
	 * Array de Tramos
	 */
    public $tramos = [];

    public function __construct($tramos_id = [])
    {
    	foreach ($tramos_id as $id) {
    		$this->tramos[] = Tramo::find($id);
    	}
    }

    public function fechaInicio()
    {
    	return $this->tramos[0]->fechaInicio;
    }

    public function fechaTermino()
    {
    	return $this->tramos[-1]->fechaTermino;
    }

    public function aeropuertoOrigen()
    {
    	return $this->tramos[0]->origen->nombre;
    }

    public function aeropuertoDestino()
    {
    	return $this->tramos[-1]->destino->nombre;
    }
    
}
