<?php

namespace App\Http\Controllers\ReservaAuto;

use Illuminate\Http\Request;
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
        return ReservaAuto::all();
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
        $data = $this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'auto_id' => 'required',
            'orden_compra_id' => 'required',
        ]);
        return ReservaAuto::create($data);
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'auto_id' => 'required',
            'orden_compra_id' => 'required',
        ]);
        $reserva = ReservaAuto::find($id);
        $reserva->fecha_inicio = request('fecha_inicio');
        $reserva->fecha_termino = request('fecha_termino');
        $reserva->fecha_reserva = request('fecha_reserva');
        $reserva->descuento = request('descuento');
        $reserva->costo = request('costo');
        $reserva->auto_id = request('auto_id');
        $reserva->orden_compra_id = request('orden_compra_id');
        $reserva->save();

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
        return $reserva->delete();
    }
}
