<?php

namespace App\Http\Controllers\Paquetes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\Paquetes\PaqueteVueloHotel;

class PaqueteVueloHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PaqueteVueloHotel::all();
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
        $paqueteVueloHotelData = $this->validate($request, [
        'descripcion' => 'requiered',
        'descuento' => 'requiered',
        'reserva_habitacion_id' => 'requiered',
        'orden_compra_id' => 'requiered',
        ]);

        return PaqueteVueloHotel::create($paqueteVueloHotelData);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PaqueteVueloHotel::find($id);
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
     
        $paqueteVueloHotel = PaqueteVueloHotel::find($id);
        $this->validate($request, [
        'descripcion' => 'requiered',
        'descuento' => 'requiered',
        'reserva_habitacion_id' => 'requiered',
        'orden_compra_id' => 'requiered',
        ]);

        $paqueteVueloHotel->descripcion = $request->get('descripcion');
        $paqueteVueloHotel->descuento = $request->get('descuento');
        $paqueteVueloHotel->reserva_habitacion_id = $request->get('reserva_habitacion_id');
        $paqueteVueloHotel->orden_compra_id = $request->get('orden_compra_id');

        $paqueteVueloHotel->save();
        
        return $paqueteVueloHotel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaqueteVueloHotel::destroy($id);
        return PaqueteVueloHotel::all();
    }
}
