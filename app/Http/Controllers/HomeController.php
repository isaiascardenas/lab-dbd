<?php

namespace App\Http\Controllers;

use App\Modulos\ReservaAuto\Auto;
use App\Modulos\ReservaAuto\Sucursal;
use App\Modulos\ReservaVuelo\Aeropuerto;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaActividad\Actividad;
use App\Modulos\ReservaHabitacion\Habitacion;

class HomeController extends Controller
{

    public function index()
    {
        $autos = Auto::all();
        $actividades = Actividad::all();
        $tipoPasaje = TipoAsiento::all();
        $aeropuertos = Aeropuerto::all();
        $habitaciones = Habitacion::all();
        $sucursales = Sucursal::with('ciudad', 'compania')->get();
        // "paquetes" => Paquetes::all()
        $paquetes = [];

        return view('home', compact(
            'autos',
            'paquetes',
            'sucursales',
            'tipoPasaje',
            'actividades',
            'aeropuertos',
            'habitaciones'
        ));
    }

    public function cart()
    {
        $data = [];

        return view('cart', compact("data"));
    }
}

