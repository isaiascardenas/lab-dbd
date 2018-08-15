<?php

namespace App\Http\Controllers;

use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaVuelo\Aeropuerto;

class HomeController extends Controller
{

  public function index()
  {
		$tipoPasaje = TipoAsiento::all();
		$aeropuertos = Aeropuerto::all();
		// "paquetes"		=> Paquetes::all()
		$paquetes	= [];

    return view('home', compact('tipoPasaje', 'aeropuertos', 'paquetes'));
  }

  public function cart()
  {
  	$data = [];

  	return view('cart', compact("data"));
  }
}
