<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modulos\ReservaVuelo\Avion;
use App\Modulos\ReservaVuelo\Tramo;
use App\Modulos\ReservaVuelo\Aerolinea;
use App\Modulos\ReservaVuelo\Aeropuerto;

class TramosController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tramos = Tramo::all();

    return view('modulos.ReservaVuelo.tramos.index', compact('tramos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $aviones = Avion::all();
    $aeropuertos = Aeropuerto::all();

    return view('modulos.ReservaVuelo.tramos.create', compact('aviones', 'aeropuertos'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $tramo = Tramo::create($this->validate($request, [
                'codigo' => 'required',
                'fecha_partida' => 'required|date',
                'fecha_llegada' => 'required|date',
                'avion_id' => 'required|integer',
                'origen_id' => 'required|integer',
                'destino_id' => 'required|integer'
              ]));

    if ($tramo->exists()) {
      $response = ['success' => 'Creado con éxito!'];
    } else {
      $response = ['error' => 'No se ha podido crear!'];
    }

    return redirect('/tramos')->with($response);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Tramo $tramo)
  {
    return view('modulos.ReservaVuelo.tramos.show', compact('tramo'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Tramo $tramo)
  {
    $aviones = Avion::all();
    $aeropuertos = Aeropuerto::all();

    return view('modulos.ReservaVuelo.tramos.edit', compact('tramo', 'aviones', 'aeropuertos'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Tramo $tramo)
  {
    $outcome = $tramo->fill($this->validate($request, [
      'codigo'        => 'required',
      'fecha_partida' => 'required|date',
      'fecha_llegada' => 'required|date',
      'avion_id'      => 'required|integer',
      'origen_id'     => 'required|integer',
      'destino_id'    => 'required|integer'
    ]))->save();
    
    if ($outcome) {
      $response = ['success' => 'Actualizado con éxito!'];
    } else {
      $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
    }

    return redirect('/tramos/'.$tramo->id.'/edit')->with($response);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tramo $tramo)
  {
    $response = [];
    try {
      $tramo->delete();
      $response = ['success' => 'Eliminado con éxito!'];
    } catch (\Exception $e) {
      $response = ['error' => 'Error al eliminar el registro!'];
    }

    return redirect('/tramos')->with($response);
  }
}
