<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Aerolinea;
use App\Aeropuerto;
use App\Avion;
use App\Tramo;

class TramosController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tramos = Tramo::paginate(20);

    return view('modulos.ReservaVuelo.tramos.index', compact("tramos"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $aviones = Avion::all();
    $aeropuertos = Aeropuerto::all();
    $aerolineas = Aerolinea::all();

    return view('modulos.ReservaVuelo.tramos.create', compact(['aerolineas', 'aeropuertos', 'aviones']));
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
      'codigo'    => 'required',
      'fecha_partida' => 'required|date',
      'fecha_llegada' => 'required|date',
      'avion_id'    => 'required|integer',
      'origen_id'   => 'required|integer',
      'destino_id'  => 'required|integer'
    ]);

    Tramo::create(request([
      'codigo',
      'fecha_partida',
      'fecha_llegada',
      'avion_id',
      'origen_id',
      'destino_id'
    ]));

    return redirect('/tramos/');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Tramo $tramo)
  {
    return view('modulos.ReservaVuelo.tramos.show', compact('tramo'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Tramo $tramo)
  {
    $aviones = Avion::all();
    $aeropuertos = Aeropuerto::all();
    $aerolineas = Aerolinea::all();

    return view('modulos.ReservaVuelo.tramos.edit', compact(['aerolineas', 'aeropuertos', 'aviones', 'tramo']));
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
    $this->validate($request, [
      'codigo'        => 'required',
      'fecha_partida' => 'required|date',
      'fecha_llegada' => 'required|date',
      'avion_id'      => 'required|integer',
      'origen_id'     => 'required|integer',
      'destino_id'    => 'required|integer'
    ]);
    
    $tramo->codigo        = $request->get('codigo');
    $tramo->fecha_partida = $request->get('fecha_partida');
    $tramo->fecha_llegada = $request->get('fecha_llegada');
    $tramo->avion_id      = $request->get('avion_id');
    $tramo->origen_id     = $request->get('origen_id');
    $tramo->destino_id    = $request->get('destino_id');
  
    $tramo->save(); 

    redirect('/tramos/');
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

    redirect('/tramos/');
  }
}
