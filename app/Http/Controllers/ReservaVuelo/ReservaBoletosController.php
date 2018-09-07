<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Modulos\ReservaVuelo\Tramo;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaVuelo\ReservaBoleto;
use App\OrdenCompra;

class ReservaBoletosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservaBoletos = ReservaBoleto::all();

      return view('modulos.ReservaVuelo.reserva-boletos.index', compact('reservaBoletos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tramos = Tramo::all();
      $ordenCompras = OrdenCompra::all();

      return view('modulos.ReservaVuelo.reserva-boletos.create', compact('tramos', 'ordenCompras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $reservaBoleto = ReservaBoleto::create($this->validate($request, [
        'fecha_reserva' => 'required|date',
        'descuento' => 'required|numeric',
        'costo' => 'required|numeric',
        'tramo_id' => 'required|integer'
      ]));

      if ($reservaBoleto->exists()) {
        $response = ['success' => 'Creado con éxito!'];
      } else {
        $response = ['error' => 'No se ha podido crear!'];
      }

      return redirect('/reserva-boletos')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaBoleto $reservaBoleto)
    {
      return view('modulos.ReservaVuelo.reserva-boletos.show', compact('reservaBoleto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservaBoleto $reservaBoleto)
    {
      $tramos = Tramo::all();
      $ordenCompras = OrdenCompra::all();

      return view('modulos.ReservaVuelo.reserva-boletos.edit', compact('reservaBoleto', 'tramos', 'ordenCompras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservaBoleto $reservaBoleto)
    {
      $outcome = $reservaBoleto->fill($this->validate($request, [
        'fecha_reserva' => 'required|date',
        'descuento' => 'required',
        'costo' => 'required',
        'tramo_id' => 'required|integer'
      ]))->save();

      if ($outcome) {
        $response = ['success' => 'Actualizado con éxito!'];
      } else {
        $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
      }

      return redirect('/reserva-boletos/'.$reservaBoleto->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservaBoleto  $reservaBoleto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaBoleto $reservaBoleto)
    {
      $response = [];
      try {
        $reservaBoleto->delete();
        $response = ['success' => 'Eliminado con éxito!'];
      } catch (\Exception $e) {
        $response = ['error' => 'Error al eliminar el registro!'];
      }

      return redirect('/reserva-boletos')->with($response);
    }
}
