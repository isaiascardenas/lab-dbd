<?php

namespace App\Http\Controllers\ReservaTraslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaTraslado\ReservaTraslado;

class ReservaTrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservas = ReservaTraslado::all();

      return $reservas;
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
        'tramo_id' => 'required',
        'orden_compra_id' => 'required'
      ]);

      ReservaTraslado::create(request([
        'fecha_reserva',
        'descuento',
        'costo',
        'asiento_avion_id',
        'tramo_id',
        'orden_compra_id'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaTraslado $reservaTraslado)
    {
      return $reservaTraslado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservaTraslado $reservaTraslado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservaTraslado $reservaTraslado)
    {
       $this->validate($request, [
         'fecha_reserva' => 'required',
         'descuento' => 'required',
         'costo' => 'required',
         'asiento_avion_id' => 'required',
         'tramo_id' => 'required',
         'orden_compra_id' => 'required'
       ]);

       
      $reservaTraslado->fecha_reserva = $request->get('fecha_reserva');
      $reservaTraslado->descuento = $request->get('descuento');
      $reservaTraslado->costo = $request->get('costo');
      $reservaTraslado->asiento_avion_id = $request->get('asiento_avion_id');
      $reservaTraslado->tramo_id = $request->get('tramo_id');
      $reservaTraslado->orden_compra_id = $request->get('orden_compra_id');

      $reservaTraslado->save();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaTraslado $reservaTraslado)
    {
      $reservaTraslado->delete();
    }
}
