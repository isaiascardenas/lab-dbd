<?php

namespace App\Http\Controllers;

use App\Modulos\ReservaAuto\Auto;
use App\Modulos\ReservaAuto\Sucursal;
use App\Modulos\ReservaVuelo\Aeropuerto;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaActividad\Actividad;

class HomeController extends Controller
{

    public function index()
    {
        $autos = Auto::all();
        $actividades = Actividad::all();
        $tipoPasaje = TipoAsiento::all();
        $aeropuertos = Aeropuerto::all();
        $hoteles = Hotel::all();
        $sucursales = Sucursal::with('ciudad', 'compania')->get();
        // "paquetes" => Paquetes::all()
        $paquetes = [];

        return view('home', compact(
            'autos',
            'hoteles',
            'paquetes',
            'sucursales',
            'tipoPasaje',
            'actividades',
            'aeropuertos'
        ));
    }

    public function cart()
    {
        $data = [];

        return view('cart', compact("data"));
    }
}

