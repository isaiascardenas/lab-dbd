<?php

namespace App\Http\Controllers;

use App\TipoAsiento;
use App\Aeropuerto;

class HomeController extends Controller
{

    public function index()
    {
    	$data = [
    		"tipoPasaje" 	=> TipoAsiento::all(),
    		"aeropuertos" 	=> Aeropuerto::all(),
    		// "paquetes"		=> Paquetes::all()
    		"paquetes"		=> [],
            "localizacion"      => []
    	];

        return view('home', compact("data"));
    }

    public function cart()
    {
    	$data = [];

    	return view('cart', compact("data"));
    }
}
