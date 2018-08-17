<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Modulos\ReservaVuelo\Avion;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\Aerolinea;

class AvionesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Avion::all();
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
      'descripcion' => 'required',
      'aerolinea_id' => 'required|integer'
    ]));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Avion $avion)
  {
    return $avion;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Avion $avion)
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
  public function update(Request $request, Avion $avion)
  {
    $avion->fill($this->validate($request, [
      'descripcion' => 'required',
      'aerolinea_id' => 'required|integer'
    ]))->save();

    return $avion;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Avion $avion)
  {
    $avion->delete();

    return Avion::all();
  }
}
