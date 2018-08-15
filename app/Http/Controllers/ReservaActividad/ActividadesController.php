<?php

namespace App\Http\Controllers\ReservaActividad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaActividad\Actividad;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Actividad::all();
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
        return Actividad::create([$this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'descripcion' => 'required',
            'max_ninos' => 'required',
            'max_adultos' => 'required',
            'costo_nino' => 'required',
            'costo_adulto' => 'required',
            'ciudad_id' => 'required',
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
        return Actividad::find($id);
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
        $actividad = Actividad::find($id);
        $actividad->fecha_inicio = $request->fecha_inicio;
        $actividad->fecha_termino = $request->fecha_termino;
        $actividad->descripcion = $request->descripcion;
        $actividad->max_ninos = $request->max_ninos;
        $actividad->max_adultos = $request->max_adultos;
        $actividad->costo_nino = $request->costo_nino;
        $actividad->costo_adulto = $request->costo_adulto;
        $actividad->ciudad_id = $request->ciudad_id;
        $actividad->save();
        return $actividad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();
        return Actividad::all();
    }
}
