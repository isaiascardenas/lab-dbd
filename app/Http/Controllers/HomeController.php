<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Modulos\ReservaAuto\Auto;
use App\Modulos\ReservaAuto\Sucursal;
use App\Modulos\ReservaVuelo\Aeropuerto;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaHabitacion\Habitacion;
use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaActividad\Actividad;

class HomeController extends Controller
{

    public function index()
    {
        $autos = Auto::all();
        $ciudades = Ciudad::all();
        $actividades = Actividad::all();
        $tipoPasaje = TipoAsiento::all();
        $aeropuertos = Aeropuerto::all();
        $hoteles = Hotel::all();
        $habitaciones = Habitacion::all();
        $sucursales = Sucursal::with('ciudad', 'compania')->get();
        // "paquetes" => Paquetes::all()
        $paquetes = [];

        return view('home', compact(
            'autos',
            'hoteles',
            'paquetes',
            'ciudades',
            'sucursales',
            'tipoPasaje',
            'actividades',
            'habitaciones',
            'aeropuertos'

        ));
    }

    public function cart()
    {
        $data = [];

        return view('cart', compact("data"));
    }
}

