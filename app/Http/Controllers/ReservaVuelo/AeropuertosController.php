<?php

namespace App\Http\Controllers\ReservaVuelo;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\Aeropuerto;


class AeropuertosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Aeropuerto::all();
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
    return Aeropuerto::create($this->validate($request, [
      'codigo'    => 'required',
      'nombre'    => 'required',
      'direccion' => 'required',
      'ciudad_id' => 'required|integer'
    ]));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Aeropuerto $aeropuerto)
  {
    return $aeropuerto;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Aeropuerto $aeropuerto)
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
  public function update(Request $request, Aeropuerto $aeropuerto)
  {

    $aeropuerto->fill($this->validate($request, [
      'codigo' => 'required',
      'nombre' => 'required',
      'direccion' => 'required',
      'ciudad_id' => 'required|integer'
    ]))->save();

    return $aeropuerto;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Aeropuerto $aeropuerto)
  {
    $aeropuerto->delete();

    return Aeropuerto::all();
  }
}
