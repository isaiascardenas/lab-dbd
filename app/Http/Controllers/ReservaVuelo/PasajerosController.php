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
    $pasajeros = Pasajero::all();

    return view('modulos.ReservaVuelo.pasajeros.index', compact('pasajeros'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('modulos.ReservaVuelo.pasajeros.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $pasajero = Pasajero::create($this->validate($request, [
      'nombre' => 'required',
      'rut' => 'required',
      'reserva_boleto_id' => 'required|integer'
    ]));

    if ($pasajero->exists()) {
      $response = ['success' => 'Creado con éxito!'];
    } else {
      $response = ['error' => 'No se ha podido crear!'];
    }

    return redirect('/pasajeros')->with($response);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pasajero  $pasajero
   * @return \Illuminate\Http\Response
   */
  public function show(Pasajero $pasajero)
  {
    return view('modulos.ReservaVuelo.pasajeros.show', compact('pasajero'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pasajero  $pasajero
   * @return \Illuminate\Http\Response
   */
  public function edit(Pasajero $pasajero)
  {
    return view('modulos.ReservaVuelo.pasajeros.edit', compact('pasajero'));
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
