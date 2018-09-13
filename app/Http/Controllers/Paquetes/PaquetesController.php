<?php

namespace App\Http\Controllers\Paquetes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modulos\Paquetes\PaqueteVueloHotel;
use App\Modulos\Paquetes\PaqueteVueloAuto;

class PaquetesController extends Controller
{
  public function index()
  {
    $paquetesVH = PaqueteVueloHotel::all();
    $paquetesVA = PaqueteVueloAuto::all();

    return view('modulos.paquetes.index', compact('paquetesVH', 'paquetesVA'));
  }
  
  public function store($tipo, $paquete_id)
  {
    $paquete = null;

    if ($tipo == 1) {
      $paquete = PaqueteVueloHotel::findOrFail($paquete_id);
      
      request()->session()->push('reservas', [
          'tipo' => 'paqueteVH',
          'reserva' => [
            'detalle' => $paquete->load('reservaBoletos', 'reservaHabitacion')
          ]
      ]);
    } else {
      $paquete = PaqueteVueloAuto::findOrFail($paquete_id);

      request()->session()->push('reservas', [
          'tipo' => 'paqueteVA',
          'reserva' => [
            'detalle' => $paquete->load('reservaBoletos', 'reservaAuto')
          ]
      ]);
    }

    if ($paquete) {
        $response = ['success' => 'Añadido al carrito con éxito!'];
    } else {
        $response = ['error' => 'Ups, hubo un problema... intenta de nuevo'];
    }

    return redirect('/cart')->with($response);
  }


  public function show($tipo, $paquete_id)
  {
    $paquete = null;

    if ($tipo == 1) {
      $paquete = PaqueteVueloHotel::findOrFail($paquete_id);
    } else {
      $paquete = PaqueteVueloAuto::findOrFail($paquete_id);
    }

    return view('modulos.paquetes.show', compact('paquete', 'tipo'));
  }
}
