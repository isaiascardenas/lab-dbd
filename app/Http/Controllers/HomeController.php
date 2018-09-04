<?php

namespace App\Http\Controllers;

use App\Modulos\ReservaAuto\Auto;
use App\Modulos\ReservaAuto\Sucursal;
use App\Modulos\ReservaVuelo\Aeropuerto;
use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaActividad\Actividad;
use App\Modulos\ReservaHabitacion\Habitacion;

class HomeController extends Controller
{

    public function index()
    {
        $autos = Auto::all();
        $sucursales = Sucursal::with('ciudad', 'compania')->get();
        $actividades = Actividad::all();
        $tipoPasaje = TipoAsiento::all();
        $aeropuertos = Aeropuerto::all();
        $habitaciones = Habitacion::all();
        // "paquetes" => Paquetes::all()
        $paquetes = [];

        \Log::info($sucursales->first());

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
