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
        return ReservaTraslado::all();
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
        return ReservaTraslado::create($this->validate($request, [
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'asiento_avion_id' => 'required',
            'tramo_id' => 'required',
            'orden_compra_id' => 'required'
        ]))->save();
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
        $reservaTraslado->fill($this->validate($request, [
         'fecha_reserva' => 'required',
         'descuento' => 'required',
         'costo' => 'required',
         'asiento_avion_id' => 'required',
         'tramo_id' => 'required',
         'orden_compra_id' => 'required'
       ]))->save();

        return $resrevaTraslado;
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
        ReservaTraslado::all();
    }
}
