<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\ReservaBoleto;

class ReservaBoletosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return ReservaBoleto::all();
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
      return ReservaBoleto::create($this->validate($request, [
        'fecha_reserva' => 'required',
        'descuento' => 'required',
        'costo' => 'required',
        'asiento_avion_id' => 'required',
        'tramo_id' => 'required'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaBoleto $reservaBoleto)
    {
      return $reservaBoleto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservaBoleto $reservaBoleto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservaBoleto $reservaBoleto)
    {
      $reservaBoleto->fill($this->validate($request, [
        'fecha_reserva' => 'required',
        'descuento' => 'required',
        'costo' => 'required',
        'asiento_avion_id' => 'required',
        'tramo_id' => 'required'
      ]))->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaBoleto $reservaBoleto)
    {
      $reservaBoleto->delete();

      return ReservaBoleto::all();
    }
}
