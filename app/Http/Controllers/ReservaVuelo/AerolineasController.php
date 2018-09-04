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
    $aerolineas = Aerolinea::all();

    return view('modulos.ReservaVuelo.aerolineas.index', compact('aerolineas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('modulos.ReservaVuelo.aerolineas.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $aerolinea = Aerolinea::create($this->validate($request, [
      'nombre' => 'required'
    ]));

    if ($aerolinea instanceof \Illuminate\Database\Eloquent\Model) {
      $response = ['success' => 'Creado con éxito!'];
    } else {
      $response = ['error' => 'No se ha podido crear!'];
    }

    return redirect('/aerolineas')->with($response);
  }

  /**
   * Display the specified resource.
   *
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function show(Aerolinea $aerolinea)
  {
    return view('modulos.ReservaVuelo.aerolineas.show', compact('aerolinea'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function edit(Aerolinea $aerolinea)
  {
    return view('modulos.ReservaVuelo.aerolineas.edit', compact('aerolinea'));
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
    $outcome = $aerolinea->fill($this->validate($request, [
      'nombre' => 'required'
    ]))->save();

    if ($outcome) {
      $response = ['success' => 'Actualizado con éxito!'];
    } else {
      $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
    }

    return redirect('/aerolineas/'.$aerolinea->id.'/edit')->with($response);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  Aerolinea  $aeropuerto
   * @return \Illuminate\Http\Response
   */
  public function destroy(Aerolinea $aerolinea)
  {
    $response = [];
    try {
      $aerolinea->delete();
      $response = ['success' => 'Eliminado con éxito!'];
    } catch (\Exception $e) {
      $response = ['error' => 'Error al eliminar el registro!'];
    }

    return redirect('/aerolineas')->with($response);
  }
}
