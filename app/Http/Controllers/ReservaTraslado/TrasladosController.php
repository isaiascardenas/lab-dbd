<?php

namespace App\Http\Controllers\ReservaTraslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaTraslado\Traslado;

class TrasladosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Traslado::all();
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
    return Traslado::create($this->validate($request, [
      'tipo' => 'required',
      'fecha_inicio' => 'required',
      'fecha_termino' => 'required',
      'capacidad' => 'required',
      'aeropuerto_id' => 'required',
      'hotel_id' => 'required'
    ]));
  }


  /**
   * Display the specified resource.
   *
   * @param  \App\Traslado  $traslado
   * @return \Illuminate\Http\Response
   */
  public function show(Traslado $traslado)
  {
    return $traslado;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Traslado  $traslado
   * @return \Illuminate\Http\Response
   */
  public function edit(Traslado $traslado)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Traslado  $traslado
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Traslado $traslado)
  {
    $traslado->fill($this->validate($request, [
      'tipo' => 'required',
      'fecha_inicio' => 'required',
      'fecha_termino' => 'required',
      'capacidad' => 'required',
      'aeropuerto_id' => 'required',
      'hotel_id' => 'required'
    ]))->save();

    return $traslado;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Traslado  $traslado
   * @return \Illuminate\Http\Response
   */
  public function destroy(Traslado $traslado)
  {
    $traslado->delete();

    return Traslado::all();
  }
}
