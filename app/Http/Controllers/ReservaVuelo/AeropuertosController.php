<?php

namespace App\Http\Controllers\ReservaVuelo;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
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
    $aeropuertos = Aeropuerto::all();

    return view('modulos.ReservaVuelo.aeropuertos.index', compact('aeropuertos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $ciudades = Ciudad::all();

    return view('modulos.ReservaVuelo.aeropuertos.create', compact('ciudades'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $aeropuerto = Aeropuerto::create($this->validate($request, [
      'codigo'    => 'required',
      'nombre'    => 'required',
      'direccion' => 'required',
      'ciudad_id' => 'required|integer'
    ]));

    if ($aeropuerto instanceof Model) {
      $response = ['success' => 'Creado con éxito!'];
    } else {
      $response = ['error' => 'No se ha podido crear!'];
    }

    return redirect('/aeropuertos')->with($response);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Aeropuerto $aeropuerto)
  {
    return view('modulos.ReservaVuelo.aeropuertos.show', compact('aeropuerto'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Aeropuerto $aeropuerto)
  {
    $ciudades = Ciudad::all();
    
    return view('modulos.ReservaVuelo.aeropuertos.edit', compact('aeropuerto', 'ciudades'));
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
    $outcome = $aeropuerto->fill($this->validate($request, [
      'codigo' => 'required',
      'nombre' => 'required',
      'direccion' => 'required',
      'ciudad_id' => 'required|integer'
    ]))->save();

    if ($outcome) {
      $response = ['success' => 'Actualizado con éxito!'];
    } else {
      $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
    }

    return redirect('/aeropuertos/'.$aeropuerto->id.'/edit')->with($response);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Aeropuerto $aeropuerto)
  {
    $response = [];
    try {
      $aeropuerto->delete();
      $response = ['success' => 'Eliminado con éxito!'];
    } catch (\Exception $e) {
      $response = ['error' => 'Error al eliminar el registro!'];
    }

    return redirect('/aeropuertos')->with($response);
  }
}
