<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Modulos\ReservaVuelo\Avion;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\Aerolinea;
use Illuminate\Database\Eloquent\Model;

class AvionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aviones = Avion::all();

      return view('modulos.ReservaVuelo.aviones.index', compact('aviones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $aviones = Avion::all();

      return view('modulos.ReservaVuelo.aviones.index', compact('aviones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $avion = Avion::create($this->validate($request, [
        'descripcion' => 'required',
        'aerolinea_id' => 'required|integer'
      ]));

      if ($avion instanceof Model) {
        $response = ['success' => 'Creado con éxito!'];
      } else {
        $response = ['error' => 'No se ha podido crear!'];
      }

      return redirect('/aviones/'.$avion->id)->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avion  $avion
     * @return \Illuminate\Http\Response
     */
    public function show(Avion $avion)
    {
      return view('modulos.ReservaVuelo.aviones.show', compact('avion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avion  $avion
     * @return \Illuminate\Http\Response
     */
    public function edit(Avion $avion)
    {
      return view('modulos.ReservaVuelo.aerolineas.edit', compact('avion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Avion  $avion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avion $avion)
    {
      $outcome = $avion->fill($this->validate($request, [
        'descripcion' => 'required',
        'aerolinea_id' => 'required|integer'
      ]))->save();

      if ($outcome) {
        $response = ['success' => 'Actualizado con éxito!'];
      } else {
        $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
      }

      return redirect('/aviones/'.$avion->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avion  $avion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avion $avion)
    {
      $response = [];
      try {
        $aerolinea->delete();
        $response = ['success' => 'Eliminado con éxito!'];
      } catch (\Exception $e) {
        $response = ['error' => 'Error al eliminar el registro!'];
      }

      return redirect('/aerolineas')->with($response);
    }
}
