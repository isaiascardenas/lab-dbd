<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\Pasajero;

class PasajerosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Pasajero::all();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    return Pasajero::create($this->validate($request, [
      'nombre' => 'required',
      'rut' => 'required',
      'reserva_boleto_id' => 'required'
    ]));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pasajero  $pasajero
   * @return \Illuminate\Http\Response
   */
  public function show(Pasajero $pasajero)
  {
    return $pasajero;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pasajero  $pasajero
   * @return \Illuminate\Http\Response
   */
  public function edit(Pasajero $pasajero)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pasajero  $pasajero
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pasajero $pasajero)
  {
    $pasajero->fill($this->validate($request, [
      'nombre' => 'required',
      'rut' => 'required',
      'reserva_boleto_id' => 'required'
    ]))->save();

    return $pasajero;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Pasajero  $pasajero
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pasajero $pasajero)
  {
    $response = [];
    try {
      $pasajero->delete();
      $response = ['success' => 'Eliminado con éxito!'];
    } catch (\Exception $e) {
      $response = ['error' => 'Error al eliminar el registro!'];
    }

    return redirect('/pasajeros')->with($response);
  }
}
