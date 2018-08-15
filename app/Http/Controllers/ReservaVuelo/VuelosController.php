<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tramo;
use App\Vuelo;

class VuelosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
  	
  	// $this->validate(request(), [
  	// 	'origen_id' 		=> 'required|integer',
  	// 	'destino_id' 		=> 'required|integer',
  	// 	'tipo_vuelo' 		=> 'required|integer|between:0,1',
  	// 	'fecha_ida'			=> 'required|date',
  	// 	'fecha_vuelta' 		=> 'required_if:tipo_vuelo,1|date',
  	// 	'pasajeros_adultos' => 'required|integer',
  	// 	'pasajeros_ninos' 	=> 'required|integer',
  	// 	'tipo_pasaje' 		=> 'required|integer|between:1,3'
  	// ]);
  	
  	// $data["vuelos"] = Tramo::buscarVuelos(request());


  	$vuelos = Tramo::all()->take(10);

    return view('modulos.ReservaVuelo.vuelos.index', compact("vuelos"));
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
