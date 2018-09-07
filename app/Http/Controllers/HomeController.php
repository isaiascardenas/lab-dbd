<?php

namespace App\Http\Controllers;

use App\Ciudad;
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
        $ciudades = Ciudad::all();
        $actividades = Actividad::all();
        $tipoPasaje = TipoAsiento::all();
        $aeropuertos = Aeropuerto::all();
        $hoteles = Hotel::all();
        $habitaciones = Habitacion::all();
        $sucursales = Sucursal::with('ciudad', 'compania')->get();
        // "paquetes" => Paquetes::all()
        $paquetes = [];

        // request()->session()->forget('busqueda');
        // request()->session()->forget('reservas');

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

    public function payAll()
    {
        // Here make a order and link it with all reservations
        //
      
        //
        //
        collect(request()->session()->get('reservas'))->each(function ($reserva) {
            if ($reserva['tipo'] == 'auto') {
                $reserva['reserva']['detalle']->save();
            } else if ($reserva['tipo'] == 'hotel') {
              
            } else if ($reserva['tipo'] == 'vuelo') {
                $reserva['reserva']['detalle']->save(); // pasaje
                $reserva['reserva']['extra']->save();   // pasajero
            } else if ($reserva['tipo'] == 'actividad') {
              # code...
            }
        });

        request()->sesison()->forget('reservas');

        return view('cart', compact('reservas'));
    }

    public function deleteFromcart()
    {
        $reservas = request()->session()->get('reservas');
        
        unset($reservas[request('reserva_id')]);

        $reservas = request()->session()->put('reservas', $reservas);

        return redirect('/cart')->with('success', 'Reserva Eliminada!');
    }

    public function cart()
    {
        // request()->session()->forget('reservas');
        $reservas = request()->session()->get('reservas');
        // dd($reservas);
        return view('cart', compact('reservas'));
    }
}

