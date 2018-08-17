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
    return Tramo::all();
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
    return Tramo::create($this->validate($request, [
      'codigo'    => 'required',
      'fecha_partida' => 'required|date',
      'fecha_llegada' => 'required|date',
      'avion_id'    => 'required|integer',
      'origen_id'   => 'required|integer',
      'destino_id'  => 'required|integer'
    ]));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Tramo $tramo)
  {
    return $tramo;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Tramo $tramo)
  {
    //
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
    $tramo->fill($this->validate($request, [
      'codigo'        => 'required',
      'fecha_partida' => 'required|date',
      'fecha_llegada' => 'required|date',
      'avion_id'      => 'required|integer',
      'origen_id'     => 'required|integer',
      'destino_id'    => 'required|integer'
    ]))->save();
    
    return $tramo;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tramo $tramo)
  {
    $tramo->delete();

    return Tramo::all();
  }
}
