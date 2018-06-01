<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueloController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = [
            ["id"=> 1, "pais" => "Chile", "nombre" => "Santiago"],
            ["id"=> 2, "pais" => "Chile", "nombre" => "Melipilla"],
            ["id"=> 3, "pais" => "Chile", "nombre" => "Maipu"]
        ];

        return view('vuelo.index', compact("ciudades"));
    }

    public function list()
    {
        // $data["vuelos"] = App\Vuelo::all()->toArray();

        return view('vuelo.list', compact("data"));
    }

    public function show()
    {
        return view('vuelo.show');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reserva()
    {
        return view('vuelo.reserva');
    }
}
