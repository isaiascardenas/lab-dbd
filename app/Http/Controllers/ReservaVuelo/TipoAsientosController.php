<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\TipoAsiento;

class TipoAsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipoAsientos = TipoAsiento::all();

      return view('modulos.ReservaVuelo.tipo-asientos.index', compact('tipoAsientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('modulos.ReservaVuelo.tipo-asientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipoAsiento = TipoAsiento::create($this->validate($request, [
                  'factor_costo' => 'required',
                  'descripcion' => 'required'
                ]));

      if ($tipoAsiento->exists()) {
        $response = ['success' => 'Creado con éxito!'];
      } else {
        $response = ['error' => 'No se ha podido crear!'];
      }

      return redirect('/tipo-asientos')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAsiento $tipoAsiento)
    {
      return view('modulos.ReservaVuelo.tipo-asientos.show', compact('tipoAsiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAsiento $tipoAsiento)
    {
      return view('modulos.ReservaVuelo.tipo-asientos.edit', compact('tipoAsiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAsiento $tipoAsiento)
    {
      $outcome = $tipoAsiento->fill($this->validate($request, [
        'factor_costo' => 'required|numeric',
        'descripcion' => 'required'
      ]))->save();

      if ($outcome) {
        $response = ['success' => 'Actualizado con éxito!'];
      } else {
        $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
      }

      return redirect('/tipo-asientos/'.$tipoAsiento->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoAsiento  $tipoAsiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAsiento $tipoAsiento)
    {
      $response = [];
      try {
        $tipoAsiento->delete();
        $response = ['success' => 'Eliminado con éxito!'];
      } catch (\Exception $e) {
        $response = ['error' => 'Error al eliminar el registro!'];
      }

      return redirect('/tipo-asientos')->with($response);
    }
}
