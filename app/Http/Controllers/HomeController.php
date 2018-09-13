<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Carbon\Carbon;
use App\Modulos\ReservaVuelo\Aeropuerto;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaTraslado\Traslado;
use App\Modulos\ReservaHabitacion\Habitacion;


class HomeController extends Controller
{

    public function index()
    {
        $ciudades = Ciudad::all();
        $tipoPasaje = TipoAsiento::all();
        $aeropuertos = Aeropuerto::all();
        $hoteles = Hotel::all();
        $habitaciones = Habitacion::all();
        $traslados = Traslado::all();
        // "paquetes" => Paquetes::all()
        $paquetes = [];

        return view('home', compact(
            'autos',
            'hoteles',
            'paquetes',
            'ciudades',
            'traslados',
            'sucursales',
            'tipoPasaje',
            'actividades',
            'habitaciones',
            'aeropuertos'
        ));
    }
}

