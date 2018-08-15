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
    $aeropuertos = Aeropuerto::all();

    return $aeropuertos;
    // $aeropuertos = Aeropuerto::paginate(20);

    // return view('modulos.ReservaVuelo.aeropuertos.index', compact('aeropuertos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // $ciudades = Ciudad::all();

    // return view('modulos.ReservaVuelo.aeropuertos.create', compact('ciudades'));
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

    // return redirect('/aeropuertos/')->with('success', 'Creado con éxito');
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
    // return view('modulos.ReservaVuelo.aeropuertos.show', compact('aeropuerto'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Aeropuerto $aeropuerto)
  {
    // $ciudades = Ciudad::all();

    // return view('modulos.ReservaVuelo.aeropuertos.edit', compact('aeropuerto', 'ciudades'));
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
      'ciudad_id' => 'required|integer'
    ]);
    
    $aeropuerto->codigo = $request->get('codigo');
    $aeropuerto->nombre = $request->get('nombre');
    $aeropuerto->direccion = $request->get('direccion');
    $aeropuerto->ciudad_id = $request->get('ciudad_id');

    $aeropuerto->save(); 

    // return redirect('/aeropuertos/')->with('success', 'Actualizado con éxito');
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

    // return redirect('/aeropuertos/')->with('success', 'Removido con éxito');
  }
}
