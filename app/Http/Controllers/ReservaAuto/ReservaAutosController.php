<?php

namespace App\Http\Controllers\ReservaAuto;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Modulos\ReservaAuto\Auto;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaAuto\ReservaAuto;

class ReservaAutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autosReservados = ReservaAuto::whereDate('fecha_inicio', '<', request('fecha_termino'))
            ->whereDate('fecha_termino', '>', request('fecha_inicio'))
            ->pluck('auto_id');

        $autos = Auto::whereSucursalId(request('sucursal_id'))
            ->where('capacidad', '>=', request('adultos') + request('ninos'))
            ->whereNotIn('id', $autosReservados)
            ->get();

        request()->session()->put('busqueda.autos', [
          'costo' => 0,
          'inicio_reserva' => request('fecha_inicio') . ':00',
          'termino_reserva' => request('fecha_termino') . ':00'
        ]);

        return view('modulos.ReservaAuto.reservas.index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservar(Auto $auto)
    {
        $inicio = Carbon::createFromFormat('Y-m-d H:m:s', request()->session()->get('busqueda.autos.inicio_reserva'));
        $termino = Carbon::createFromFormat('Y-m-d H:m:s', request()->session()->get('busqueda.autos.termino_reserva'));

        request()->session()->put('busqueda.autos.costo', $inicio->diffInHours($termino) * $auto->precio_hora);

        return view('modulos.ReservaAuto.reservas.reservar', compact('auto'));
    }
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
        $reserva = new ReservaAuto([
            'fecha_inicio' => request()->session()->get('busqueda.autos.inicio_reserva'),
            'fecha_termino' => request()->session()->get('busqueda.autos.termino_reserva'),
            'fecha_reserva' => Carbon::now()->toDateTimeString(),
            'descuento' => 1,
            'costo' => request()->session()->get('busqueda.autos.costo'),
            'auto_id' => request('auto_id'),
            'orden_compra_id' => null,
        ]);

        if ($reserva) {
            $response = ['success' => 'Añadido al carrito con éxito!'];
        } else {
            $response = ['error' => 'Ups, hubo un problema... intenta de nuevo'];
        }

        request()->session()->push('reservas', [
            'tipo' => 'auto',
            'reserva' => [
              'detalle' => $reserva->load('auto')
            ]
        ]);

        return redirect('/cart')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaAuto $reserva)
    {
        return $reserva;
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
    public function update(Request $request, ReservaAuto $reserva)
    {
        $reserva->fill($this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'auto_id' => 'required',
            'orden_compra_id' => 'required',
        ]))->save();

        return $reserva;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaAuto $reserva)
    {
        $reserva->delete();
        ReservaAuto::all();
    }
}
