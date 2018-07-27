<?php

namespace App\Http\Controllers;

use App\TipoPasaje;

class HomeController extends Controller
{

    public function index()
    {
    	$data["tipoPasaje"] = TipoPasaje::all();

    	// $data["localizacion"] = \App\Localizacion::all();

    	// $data["paquetes"] = \App\Paquetes::all();
    	$data["localizacion"] = [
    		["id"=> 1, "ciudad" => "Santiago, Chile", "aeropuerto" => "SCL, ..."],
    		["id"=> 2, "ciudad" => "Melipilla, Chile", "aeropuerto" => "MLP, ..."],
    		["id"=> 3, "ciudad" => "Maipu, Chile", "aeropuerto" => "MPU, ..."]
    	];

    	$data["paquetes"] = [
    		["id" => 1, "destino" => "Chile, Santiago", "valor" => "$200.000", "class" => "active"],
    		["id" => 2, "destino" => "Chile, Rancagua", "valor" => "$250.000", "class" => ""],
    		["id" => 3, "destino" => "USA, Miami", "valor" => "$1.200.000", "class" => ""]
    	];

        return view('home', compact("data"));
    }

    public function cart()
    {
    	$data = [];

    	return view('cart', compact("data"));
    }
}
