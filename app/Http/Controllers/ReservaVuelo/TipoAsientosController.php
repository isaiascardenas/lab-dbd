<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\TipoAsiento;

class TipoAsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return TipoAsiento::all();
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
        'factor_costo' => 'required',
        'descripcion' => 'required'
      ]));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAsiento $tipoAsiento)
    {
      // 
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
      $tipoAsiento->fill($this->validate($request, [
        'factor_costo' => 'required',
        'descripcion' => 'required'
      ]))->save();

      return $tipoAsiento;
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

      return TipoAsiento::all();
    }
}
