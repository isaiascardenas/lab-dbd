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
    // $params = $this->validate(request(), [
    //   'origen_id' => 'required|integer',
    //   'destino_id' => 'required|integer',
    //   'tipo_vuelo' => 'required|integer|between:0,1',
    //   'fecha_ida' => 'required|date',
    //   'fecha_vuelta' => 'required_if:tipo_vuelo,1|date',
    //   'pasajeros_adultos' => 'required|integer',
    //   'pasajeros_ninos' => 'required|integer',
    //   'tipo_pasaje' => 'required|integer|between:1,3'
    // ]);
    $params = [
      'origen_id' => 1,
      'destino_id' => 2,
      'tipo_vuelo' => 0,
      'fecha_ida' => '01-01-2018',
      // 'fecha_vuelta' => '01-01-2018',
      'pasajeros_adultos' => 2,
      'pasajeros_ninos' => 0,
      'tipo_pasaje' => 1
    ];

  	$vuelos = Tramo::buscarVuelos($params);

    session(['params_vuelo' => $params]);

    return view('modulos.ReservaVuelo.vuelos.index', compact('vuelos'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    $this->validate($request, [
      'tramos' => 'required|array'
    ]);

    $tramos = array_values(request('tramos'));

    $vuelo = new Vuelo($tramos);

    $paramsVuelo = session('params_vuelo');

    return view('modulos.ReservaVuelo.vuelos.show', compact('vuelo', 'paramsVuelo'));
  }

  public function reserva(Request $request)
  {
    $paramsVuelo = $request->session->get('params_vuelo');

    foreach ($request['tramos'] as $tramo_id) {
      $reservaBoleto = new reservaBoleto();

      $reservaBoleto->fecha_reserva = Carbon::now();
      $reservaBoleto->descuento = 0.0;
      $reservaBoleto->costo = $request['costo'];
      $reservaBoleto->asiento_avion_id = '';

      $reservaBoleto->tramo_id = $tramo_id;

      $request->session->push('cart', $reservaBoleto);
    }
    $request->session->forget('params_vuelo');
  	
    return view('cart');
  }
}
