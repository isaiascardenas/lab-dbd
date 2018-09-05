<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modulos\ReservaVuelo\Tramo;
use App\Modulos\ReservaVuelo\Vuelo;

class VuelosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
  	$vuelos = Tramo::buscarVuelos(request());

    return view('modulos.ReservaVuelo.vuelos.index', compact('vuelos'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    $this->validate(request(), [
      'tramo' => 'required'
    ]);

    $tramos = array_values(request("tramo"));

    $vuelo = new Vuelo($tramos);

    return view('modulos.ReservaVuelo.vuelos.show', compact("vuelo"));
  }

  public function reserva(Request $request)
  {
  	// Agrega al carro y redirige a /cart
      return view('cart');
  }
}
