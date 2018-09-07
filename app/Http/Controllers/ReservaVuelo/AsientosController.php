<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\Ciudad;
use App\Modulos\ReservaVuelo\Asiento;
use App\Modulos\ReservaVuelo\TipoAsiento;

class AsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $asientos = Asiento::all();
      return view('modulos.ReservaVuelo.asientos.index', compact('asientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('modulos.ReservaVuelo.asientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $asiento = Asiento::create($this->validate($request, [
        'codigo' => 'required',
        'tipo_asiento_id' => 'required|integer'
      ]));

      if ($asiento) {
        $outcome = ['success' => 'Creado con éxito!'];
      } else {
        $outcome = ['error' => 'No se ha podido crear!'];
      }
      return redirect('/asientos')->with($outcome);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function show(Asiento $asiento)
    {
      return view('modulos.ReservaVuelo.asientos.show', compact('asiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Asiento $asiento)
    {
      return view('modulos.ReservaVuelo.asientos.edit', compact('asiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asiento $asiento)
    {
      $asiento->fill($this->validate($request, [
        'codigo' => 'required',
        'tipo_asiento_id' => 'required|integer'
      ]))->save();
      
      return view('modulos.ReservaVuelo.asientos.edit', compact('asiento'))->with(['success' => 'Actualizado!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asiento $asiento)
    {
      $asiento->delete();

      return Asiento::all();
    }
}
