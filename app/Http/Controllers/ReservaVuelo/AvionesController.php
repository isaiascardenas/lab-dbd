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
    $aviones = Avion::all();

    return $aviones;
    // $aviones = Avion::paginate(20);

    // return view('modulos.ReservaVuelo.aviones.index', compact('aviones'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return view('modulos.ReservaVuelo.aviones.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'descripcion' => 'required',
      'aerolinea_id' => 'required|integer'
    ]);

    Aerolinea::create(request([
      'descripcion',
      'aerolinea_id'
    ]));

    // return redirect('/aviones/')->with('success', 'Creado con éxito');
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
    // return view('modulos.ReservaVuelo.aviones.show', compact('avion'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Avion $avion)
  {
    // $aerolineas = Aerolinea::all();

    // return view('modulos.ReservaVuelo.aviones.edit', compact('avion', 'aerolineas'));
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
    $this->validate($request, [
      'descripcion' => 'required',
      'aerolinea_id' => 'required|integer'
    ]);
    
    $avion->descripcion = $request->get('descripcion');
    $avion->aerolinea_id = $request->get('aerolinea_id');
  
    $avion->save(); 

    // return redirect('/aviones/')->with('success', 'Actualizado con éxtio');
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

    // return redirect('/aviones/')->with('success', 'Removido con éxito');
  }
}
