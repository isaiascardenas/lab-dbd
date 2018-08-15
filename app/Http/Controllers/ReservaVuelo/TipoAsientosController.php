<?php

namespace App\Http\Controllers\ReservaVuelo;

use App\TipoAsiento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoAsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipoAsientos = TipoAsiento::all();

      return $tipoAsientos;

      // return view('modulos.ReservaVuelo.tipo_asientos.index', compact('tipoAsientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return view('modulos.ReservaVuelo.tipo_asientos.create');
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
        'factor_costo' => 'required',
        'descripcion' => 'required'
      ]);

      Aeropuerto::create(request([
        'factor_costo',
        'descripcion'
      ]));

      // return redirect('/tipo_asientos/')->with('success', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAsiento $tipoAsiento)
    {
      return $tipoAsiento;
      // return view('modulos.ReservaVuelo.tipo_asientos.show', compact('tipoAsiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAsiento $tipoAsiento)
    {
      // return view('modulos.ReservaVuelo.tipo_asientos.show', compact('tipoAsiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAsiento $tipoAsiento)
    {
      $this->validate($request, [
        'factor_costo' => 'required',
        'descripcion' => 'required'
      ]);

      $tipoAsiento->factor_costo = $request->get('factor_costo');
      $tipoAsiento->descripcion = $request->get('descripcion');

      // return redirect('/tipo_asientos/')->with('success', 'Creado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAsiento $tipoAsiento)
    {
      $tipoAsiento->delete();

      # return redirect('/tipo_asientos/')->with('success', 'Removido con éxito');
    }
}
