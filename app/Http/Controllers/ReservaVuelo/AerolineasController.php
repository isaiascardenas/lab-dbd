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

    return $aerolineas;

    // $aerolineas = Aerolinea::paginate(20);
    // return view('modulos.ReservaVuelo.aerolineas.index', compact('aerolineas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return view('modulos.ReservaVuelo.aerolineas.create');
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
      'nombre' => 'required'
    ]);

    Aerolinea::create(request([
      'nombre'
    ]));

    // return redirect('/aerolineas/')->with('success', 'Creado con éxito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Aerolinea $aerolinea)
  {
    return $aerolinea;
    // return view('modulos.ReservaVuelo.aerolineas.show', compact('aerolinea'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Aerolinea $aerolinea)
  {
    // return view('modulos.ReservaVuelo.aerolineas.edit', compact('aerolinea'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Aerolinea $aerolinea)
  {
    $this->validate($request, [
      'nombre' => 'required'
    ]);
    
    $aerolinea->nombre = $request->get('nombre');
  
    $aerolinea->save(); 

    // return redirect('/aerolineas/')->with('success', 'Actualizado con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Aerolinea $aerolinea)
  {
    $aerolinea->delete();

    // return redirect('/aerolineas/')->with('success', 'Removido con éxito');
  }
}
