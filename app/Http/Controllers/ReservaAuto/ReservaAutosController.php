<?php

namespace App\Http\Controllers\ReservaAuto;

use Illuminate\Http\Request;
use App\Modulos\ReservaAuto\Auto;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaAuto\ReservaAuto;

class ReservaAutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autosReservados = ReservaAuto::whereDate('fecha_inicio', '<', request('fecha_termino'))
            ->whereDate('fecha_termino', '>', request('fecha_inicio'))
            ->pluck('auto_id');

        $autos = Auto::whereSucursalId(request('sucursal_id'))
            ->where('capacidad', '>=', request('adultos') + request('ninos'))
            ->whereNotIn('id', $autosReservados)
            ->get();

        // return $autos;
        return view('modulos.ReservaAuto.reservas.index', compact('autos'));
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
        return ReservaAuto::create($this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'auto_id' => 'required',
            'orden_compra_id' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaAuto $reserva)
    {
        return $reserva;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservaAuto $reserva)
    {
        $reserva->fill($this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'auto_id' => 'required',
            'orden_compra_id' => 'required',
        ]))->save();

        return $reserva;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaAuto $reserva)
    {
        $reserva->delete();
        ReservaAuto::all();
    }
}
