<?php

namespace App\Http\Controllers\ReservaTraslado;

use App\Traslado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $traslados = Traslado::all();

      return $traslados;
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
      $this->validate($request, [
        'tipo' => 'required',
        'fecha_inicio' => 'required',
        'fecha_termino' => 'required',
        'capacidad' => 'required',
        'aeropuerto_id' => 'required',
        'hotel_id' => 'required'
      ]);

      Traslado::create(request([
        'tipo',
        'fecha_inicio',
        'fecha_termino',
        'capacidad',
        'aeropuerto_id',
        'hotel_id'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function show(Traslado $traslado)
    {
      return $traslado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function edit(Traslado $traslado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traslado $traslado)
    {
      $this->validate($request, [
        'tipo' => 'required',
        'fecha_inicio' => 'required',
        'fecha_termino' => 'required',
        'capacidad' => 'required',
        'aeropuerto_id' => 'required',
        'hotel_id' => 'required'
      ]);

      $traslado->tipo = $request->get('tipo');
      $traslado->fecha_inicio = $request->get('fecha_inicio');
      $traslado->fecha_termino = $request->get('fecha_termino');
      $traslado->capacidad = $request->get('capacidad');
      $traslado->aeropuerto_id = $request->get('aeropuerto_id');
      $traslado->hotel_id = $request->get('hotel_id');

      $traslado->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traslado $traslado)
    {
      $traslado->delete();
    }
}
