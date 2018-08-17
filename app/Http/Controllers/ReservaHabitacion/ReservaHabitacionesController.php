<?php

namespace App\Http\Controllers\ReservaHabitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;

class ReservaHabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReservaHabitacion::all();
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
        $reservaHabitacionData =$this->validate($request , [
        

            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'costo' => 'required',
            'descuento' => 'required',
            'habitacion_id' => 'required',
            'orden_compra_id' => 'required'
        ]);

        return ReservaHabitacion::create($reservaHabitacionData);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ReservaHabitacion::find($id);
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
    public function update(Request $request,$id)
    {
        $reservaHabitacion = $this->validate($request , [
        

            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'costo' => 'required',
            'descuento' => 'required',
            'habitacion_id' => 'required',
            'orden_compra_id' => 'required'
        ]);

        $reservaHabitacion->fecha_inicio = $request->get('fecha_inicio');
        $reservaHabitacion->fecha_termino = $request->get('fecha_termino');
        $reservaHabitacion->fecha_reserva = $request->get('fecha_reserva');
        $reservaHabitacion->costo = $request->get('costo');
        $reservaHabitacion->descuento = $request->get('descuento');
        $reservaHabitacion->habitacion_id = $request->get('habitacion_id');
        $reservaHabitacion->orden_compra_id = $request->get('orden_compra_id');

        $reservaHabitacion->save();

        return $ReservaHabitacion;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaHabitacion $reservaHabitacion)
    {
        $reservaHabitacion->delete();
        return ReservaHabitacion::all();
    }
}
