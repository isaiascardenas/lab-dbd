<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["tipoPasaje"] = \App\TipoPasaje::all();

        // $data["localizacion"] = \App\Localizacion::all();

        // $data["paquetes"] = \App\Paquetes::all();
        $data["localizacion"] = [
            ["id"=> 1, "pais" => "Chile", "nombre" => "Santiago"],
            ["id"=> 2, "pais" => "Chile", "nombre" => "Melipilla"],
            ["id"=> 3, "pais" => "Chile", "nombre" => "Maipu"]
        ];

        $data["paquetes"] = [
            ["id" => 1, "destino" => "Chile, Santiago", "valor" => "$200.000", "class" => "active"],
            ["id" => 2, "destino" => "Chile, Rancagua", "valor" => "$250.000", "class" => ""],
            ["id" => 3, "destino" => "USA, Miami", "valor" => "$1.200.000", "class" => ""]
        ];

        return view('home', compact("data"));
    }
}
