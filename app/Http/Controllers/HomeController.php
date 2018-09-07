<?php

namespace App\Http\Controllers;

use App\Modulos\ReservaAuto\Auto;
use App\Modulos\ReservaAuto\Sucursal;
use App\Modulos\ReservaVuelo\Aeropuerto;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaAuto\ReservaAuto;
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
        $hoteles = Hotel::all();
        $habitaciones = Habitacion::all();
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
            'habitaciones',
            'aeropuertos'

        ));
    }

    public function payAll()
    {
        collect(session('reservas'))->each(function ($reserva) {
            if ($reserva['tipo'] == 'auto') {
                $reserva['reserva']->save();
            }
        });

        return view('cart', compact('reservas'));
    }

    public function deleteFromcart()
    {
        return request('reserva_id');
        $reservas = collect(session('reservas'));
        collect(session('reservas'))->each(function ($reserva) {
            if ($reserva['tipo'] == 'auto') {
                $reserva['reserva']->save();
            }
        });

        return view('cart', compact('reservas'));
    }

    public function cart()
    {
        $reservas = session('reservas');

        return view('cart', compact('reservas'));
    }
}

