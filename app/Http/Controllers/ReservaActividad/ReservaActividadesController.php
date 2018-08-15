<?php

namespace App\Http\Controllers\ReservaActividad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaActividad\ReservaActividad;

class ReservaActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReservaActividad::all();
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
        return ReservaActividad::create([$this->validate($request, [
            'capacidad_ninos' => 'required',
            'capacidad_adultos' => 'required',
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'actividad_id' => 'required',
            'orden_compra_id' => 'required',
        ])]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ReservaActividad::find($id);
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
        $reservaactividad = ReservaActividad::find($id);
        $reservaactividad->capacidad_ninos = $request->capacidad_ninos;
        $reservaactividad->capacidad_adultos = $request->capacidad_adultos;
        $reservaactividad->fecha_reserva = $request->fecha_reserva;
        $reservaactividad->save();
        return $reservaactividad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservaactividad = ReservaActividad::find($id);
        $reservaactividad->delete();
        return ReservaActividad::all();
    }
}
