<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Aeropuerto;
use App\Localizacion;

class AeropuertosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $aeropuertos = Aeropuerto::paginate(20);

    return view('modulos.ReservaVuelo.aeropuertos.index', compact('aeropuertos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $localizaciones = Localizacion::all();

    return view('modulos.ReservaVuelo.aeropuertos.create', compact('localizaciones'));
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
      'codigo'      => 'required',
      'nombre'      => 'required',
      'direccion'     => 'required',
      'localizacion_id'   => 'required|integer'
    ]);

    Aeropuerto::create(request([
      'codigo',
      'nombre',
      'direccion',
      'localizacion_id'
    ]));

    return redirect('/aeropuertos/')->with('success', 'Creado con éxito');
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
    $localizaciones = Localizacion::all();

    return view('modulos.ReservaVuelo.aeropuertos.edit', compact('aeropuerto', 'localizaciones'));
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
    $this->validate($request, [
      'codigo' => 'required',
      'nombre' => 'required',
      'direccion' => 'required',
      'localizacion_id' => 'required|integer'
    ]);
    
    $aeropuerto->codigo = $request->get('codigo');
    $aeropuerto->nombre = $request->get('nombre');
    $aeropuerto->direccion = $request->get('direccion');
    $aeropuerto->localizacion_id = $request->get('localizacion_id');

    $aeropuerto->save(); 

    return redirect('/aeropuertos/')->with('success', 'Actualizado con éxtio');
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

    return redirect('/aeropuertos/')->with('success', 'Removido con éxito');
  }
}
