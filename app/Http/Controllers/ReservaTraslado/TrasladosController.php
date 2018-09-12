<?php

namespace App\Http\Controllers\ReservaTraslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaTraslado\Traslado;

class TrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traslados = Traslado::all();
        return view('modulos.ReservaTraslado.reservas.index', compact('traslados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('modulos.ReservaActividad.reservas.create', compact('ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Traslado::create($this->validate($request, [
            'tipo' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'capacidad' => 'required',
            'aeropuerto_id' => 'required',
            'hotel_id' => 'required'
        ]));

        $actividad = Actividad::create($this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'descripcion' => 'required', 
            'max_ninos' => 'required',
            'max_adultos' => 'required',
            'costo_nino' => 'required',
            'costo_adulto' => 'required',
            'ciudad_id' => 'required'
        ]));

        if ($actividad->exists()) {
          $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/actividades')->with($response);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function show(Traslado $traslado)
    {
        return view('modulos.ReservaActividad.reservas.show', compact('actividad'));
        return $traslado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function edit(Traslado $traslado)
    {
        $ciudades = Ciudad::all();
        return view('modulos.ReservaActividad.reservas.edit', compact('actividad', 'ciudades'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traslado $traslado)
    {
        $traslado->fill($this->validate($request, [
            'tipo' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'capacidad' => 'required',
            'aeropuerto_id' => 'required',
            'hotel_id' => 'required'
        ]))->save();

        return $traslado;

        $outcome = $actividad->fill($this->validate($request, [
          'fecha_inicio' => 'required',
          'fecha_termino' => 'required',
          'descripcion' => 'required', 
          'max_ninos' => 'required',
          'max_adultos' => 'required',
          'costo_nino' => 'required',
          'costo_adulto' => 'required',
          'ciudad_id' => 'required'
        ]))->save();

        if ($outcome) {
          $response = ['success' => 'Actualizado con éxito!'];
        } else {
          $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/actividades/'.$actividad->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Traslado  $traslado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traslado $traslado)
    {
        $traslado->delete();

        return Traslado::all();
    }
}
