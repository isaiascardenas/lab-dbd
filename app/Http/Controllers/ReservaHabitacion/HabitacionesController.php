<?php

namespace App\Http\Controllers\ReservaHabitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaHabitacion\Habitacion;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Habitacion::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habitacionesData = $this->validate($request, [
            

            'descripcion' => 'requerid|string',
            'capacidad_nino' => 'requerid|integer',
            'capacidad_adulto' => 'requerid|integer',
            'precio_por_noche' => 'requerid|integer',
            'hotel_id' => 'requerid|integer'
        ]);

        return Habitacion::create($habitacionesData);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        return $habitacion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Habitacion $habitacion)
    {
        
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
        $habitaciones = Habitaciones::find($id);

        $this->validate($request, [
            

            'descripcion' => 'requerid|string',
            'capacidad_nino' => 'requerid|integer',
            'capacidad_adulto' => 'requerid|integer',
            'precio_por_noche' => 'requerid|integer',
            'hotel_id' => 'requerid|integer'
        ]);

        $habitacion->descripcion = $request->get('descripcion');
        $habitacion->capacidad_nino = $request->get('capacidad_nino');
        $habitacion->capacidad_adulto = $request->get('capacidad_adulto');
        $habitacion->precio_por_noche = $request->get('precio_por_noche');
        $habitacion->hotel_id = $request->get('hotel_id');

        $habitacion->save();

        return $habitacion;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();

        return Habitacion::all();
    }
}
