<?php

namespace App\Http\Controllers\Paquetes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\Paquetes\PaqueteVueloAuto;

class PaqueteVueloAutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PaqueteVueloAuto::all();
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
        $paqueteVueloAutoData = $this->validate($request, [
        'descripcion' => 'requiered',
        'descuento' => 'requiered',
        'reserva_auto_id' => 'requiered',
        'orden_compra_id' => 'requiered',
        ]);

        return PaqueteVueloAuto::create($paqueteVueloAutoData);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PaqueteVueloAuto::find($id);
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
     
        $paqueteVueloAutos = PaqueteVueloAuto::find($id);

        $this->validate($request, [
        'descripcion' => 'requiered',
        'descuento' => 'requiered',
        'reserva_auto_id' => 'requiered',
        'orden_compra_id' => 'requiered',
        ]);

        $paqueteVueloAutos->descripcion = $request->get('descripcion');
        $paqueteVueloAutos->descuento = $request->get('descuento');
        $paqueteVueloAutos->reserva_auto_id = $request->get('reserva_auto_id');
        $paqueteVueloAutos->orden_compra_id = $request->get('orden_compra_id');

        $paqueteVueloAutos->save();

        return $paqueteVueloAutos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaqueteVueloAuto $paqueteVueloAutos)
    {
        $paqueteVueloAutos->delete();

        return PaqueteVueloAuto::all();
    }
}
