<?php

namespace App\Http\Controllers\ReservaVuelo;

use App\Pasajero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasajerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pasajeros = Pasajero::all();
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
        'nombre' => 'required',
        'rut' => 'required',
        'reserva_boleto_id' => 'required'
      ]);

      Pasajero::create(request([
        'nombre',
        'rut',
        'reserva_boleto_id'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasajero  $pasajero
     * @return \Illuminate\Http\Response
     */
    public function show(Pasajero $pasajero)
    {
      return $pasajero;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasajero  $pasajero
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasajero $pasajero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasajero  $pasajero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasajero $pasajero)
    {
      $this->validate($request, [
        'nombre' => 'required',
        'rut' => 'required',
        'reserva_boleto_id' => 'required'
      ]);

      $pasajero->nombre = $request->get('nombre');
      $pasajero->rut = $request->get('rut');
      $pasajero->reserva_boleto_id = $request->get('reserva_boleto_id');

      $pasajero->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasajero  $pasajero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasajero $pasajero)
    {
      $pasajero->delete();
    }
}
