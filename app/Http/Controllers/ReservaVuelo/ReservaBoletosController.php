<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservaBoletosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservas = ReservaBoleto::paginate(20);

      return view('modulos.ReservaVuelo.reserva_boleto.index', compact('reservas'));
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
        'fecha_reserva' => 'required',
        'descuento' => 'required',
        'costo' => 'required',
        'asiento_avion_id' => 'required',
        'tramo_id' => 'required'
      ]);
      
      ReservaBoleto::create([
        'fecha_reserva',
        'descuento',
        'costo',
        'asiento_avion_id',
        'tramo_id'
      ]);
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
      $this->validate($request, [
        'fecha_reserva' => 'required',
        'descuento' => 'required',
        'costo' => 'required',
        'asiento_avion_id' => 'required',
        'tramo_id' => 'required'
      ]);
      
      $reservaBoleto->fecha_reserva = $request->get('fecha_reserva');
      $reservaBoleto->descuento = $request->get('descuento');
      $reservaBoleto->costo = $request->get('costo');
      $reservaBoleto->asiento_avion_id = $request->get('asiento_avion_id');
      $reservaBoleto->tramo_id = $request->get('tramo_id');

      $reservaBoleto->save();
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
    }
}
