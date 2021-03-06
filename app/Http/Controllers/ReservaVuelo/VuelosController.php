<?php

namespace App\Http\Controllers\ReservaVuelo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modulos\ReservaVuelo\Tramo;
use App\Modulos\ReservaVuelo\Vuelo;
use App\Modulos\ReservaVuelo\Pasajero;
use App\Modulos\ReservaVuelo\TipoAsiento;
use App\Modulos\ReservaVuelo\ReservaBoleto;

class VuelosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // dd(request()->session());
    if ( ! session('vuelo_vuelta')) {
      $params = $this->validate(request(), [
        'origen_id' => 'required|integer',
        'destino_id' => 'required|integer',
        'tipo_vuelo' => 'required|integer|between:0,1',
        'fecha_ida' => 'required|date',
        'fecha_vuelta' => 'required_if:tipo_vuelo,1|nullable',
        'pasajeros_adultos' => 'required|integer',
        'pasajeros_ninos' => 'required|integer',
        'tipo_pasaje' => 'required|integer|between:1,3'
      ]);
    } else {
      $params = request()->session()->get('busqueda.vuelos');
      request()->session()->forget('vuelo_vuelta');
    }
    
    $vuelos = Tramo::buscarVuelos($params);

    request()->session()->put('busqueda.vuelos', $params);

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

    $paramsVuelo = request()->session()->get('busqueda.vuelos');

    return view('modulos.ReservaVuelo.vuelos.show', compact('vuelo', 'paramsVuelo'));
  }

  public function store(Request $request)
  {
    $paramsVuelo = request()->session()->get('busqueda.vuelos');

    foreach ($request['tramos'] as $tramo_id) {
      $pasajeros = intval($paramsVuelo['pasajeros_ninos']) + intval($paramsVuelo['pasajeros_adultos']);

      $tramo = Tramo::find($tramo_id);
      $tipoAsiento = TipoAsiento::find($paramsVuelo['tipo_pasaje']);

      for($i = 0; $i < $pasajeros; $i++) {
        $reservaBoleto = new reservaBoleto();

        $pasajero = new Pasajero([
            'nombre' => $request['pasajero_nombre'][$i],
            'rut' => $request['pasajero_rut'][$i],
            'reserva_boleto_id' => null
        ]);

        $asientos = $tramo->asientosDisponibles();
        $reservaBoleto->asiento_avion_id = array_pop($asientos);

        $reservaBoleto->fecha_reserva = Carbon::now();
        $reservaBoleto->descuento = 0.0;
        $reservaBoleto->costo = $tramo->costo * $tipoAsiento->factor_costo;

        $reservaBoleto->tramo_id = $tramo_id;

        request()->session()->push('reservas', [
              'tipo' => 'vuelo',
              'reserva' => [
                'detalle' => $reservaBoleto->load('tramo'),
                'extra' => $pasajero,
              ]
            ]);
      }
    }

    // ida y vuelta?
    if ($paramsVuelo['tipo_vuelo'] == 1) {
      // cambiar a solo ida (solo 1 vuelo restante)
      $paramsVuelo['tipo_vuelo'] = 0;
      // invertir origen<->destino
      $origen_id = $paramsVuelo['origen_id'];
      $paramsVuelo['origen_id'] = $paramsVuelo['destino_id'];
      $paramsVuelo['destino_id'] = $origen_id;

      $paramsVuelo['fecha_ida'] = $paramsVuelo['fecha_vuelta'];

      request()->session()->put('busqueda.vuelos', $paramsVuelo);

      return redirect()->action('ReservaVuelo\VuelosController@index')->with('vuelo_vuelta', true);
    }

    request()->session()->forget('busqueda.vuelos');

    return redirect('/cart');
  }
}
