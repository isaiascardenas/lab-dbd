<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\Aerolinea;

class AerolineasController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Aerolinea::all();
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
    return Aerolinea::create($this->validate($request, [
      'nombre' => 'required'
    ]));
  }

  /**
   * Display the specified resource.
   *
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function show(Aerolinea $aerolinea)
  {
    return $aerolinea;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function edit(Aerolinea $aerolinea)
  {
    // 
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Aerolinea $aerolinea)
  {
    $aerolinea->fill($this->validate($request, [
      'nombre' => 'required'
    ]))->save();

    return $aerolinea;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function destroy(Aerolinea $aerolinea)
  {
    $aerolinea->delete();

    return Aerolinea::all();
  }
}
