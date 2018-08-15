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

      return $asientos;
      // $asientos = Asiento::paginate(20);

      // return view('modulos.ReservaVuelo.asientos.index', compact('asientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $tipoAsiento = TipoAsiento::all();

      // return view('modulos.ReservaVuelo.asientos.create', compact('tipoAsiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'codigo' => 'required',
        'tipo_asiento_id' => 'required|integer'
      ]);

      Aeropuerto::create(request([
        'codigo',
        'tipo_asiento_id'
      ]));

      // return redirect('/asientos/')->with('success', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function show(Asiento $asiento)
    {
      return $asiento;
      // return view('modulos.ReservaVuelo.asientos.show', compact('asiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Asiento $asiento)
    {
      // $ciudades = Ciudad::all();

      // return view('modulos.ReservaVuelo.asientos.edit', compact('aeropuerto', 'ciudades'));
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
      $this->validate($request, [
        'codigo' => 'required',
        'tipo_asiento_id' => 'required|integer'
      ]);
      
      $asiento->codigo = $request->get('codigo');
      $asiento->tipo_asiento_id = $request->get('tipo_asiento_id');

      $asiento->save();

      // return redirect('/asientos/')->with('success', 'Actualizado con éxito');
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

      // return redirect('/asientos/')->with('success', 'Removido con éxito');
    }
}
