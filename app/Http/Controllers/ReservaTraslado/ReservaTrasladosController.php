<?php

namespace App\Http\Controllers\ReservaTraslado;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaTraslado\Traslado;
use App\Modulos\ReservaTraslado\ReservaTraslado;

class ReservaTrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha = Carbon::createFromFormat('d-m-Y', request('fecha_traslado'));

        $trasladosReservados = ReservaTraslado::all()->pluck('traslado_id');
        $hotel_id = request('hotel_id_0') ? request('hotel_id_0') : request('hotel_id_1');
        $aeropuerto_id = request('aeropuerto_id_0') ? request('aeropuerto_id_0') : request('aeropuerto_id_1');

        $traslados = Traslado::
            where('capacidad', '>=', request('capacidad'))
                ->whereNotIn('id', $trasladosReservados)
                ->whereTipo(request('tipo_traslado'))
                ->whereAeropuertoId($aeropuerto_id)
                ->whereHotelId($hotel_id)
                ->whereDate('fecha_inicio', '>=', $fecha)
                ->whereDate('fecha_termino', '<=', $fecha)
                ->get();

        request()->session()->put('busqueda.traslado', [
            'costo' => 0,
            'capacidad' => request('capacidad'),
            'costo_persona' => 0
        ]);

        return view('modulos.ReservaTraslado.reservas.index', compact('traslados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Traslado $traslado)
    {
        $capacidad_p = $traslado->precio_persona;


        request()->session()->put('busqueda.traslado.costo_persona' , $traslado->precio_persona);
        request()->session()->put('busqueda.traslado.costo' , $traslado->precio_persona * $capacidad_p);
        request()->session()->put('busqueda.traslado.id', $traslado->id );

        $traslado->load('hotel', 'aeropuerto');

        return view('modulos.ReservaTraslado.reservas.create', compact('traslado'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reserva = new ReservaTraslado([
            'cantidad_pasajeros' => request()->session()->get('busqueda.traslado.capacidad'),
            'fecha_reserva'=> Carbon::now(),
            'descuento'=> 1,
            'costo' => request()->session()->get('busqueda.traslado.costo'),
            'traslado_id' => request()->session()->get('busqueda.traslado.id'),
            'orden_compra_id' => null,
        ]);

        if ($reserva) {
            $response = ['success' => 'Añadido al carrito con éxito!'];
        } else {
            $response = ['error' => 'Hubo un problema... intenta de nuevo'];
        }

        //por preguntar
        request()->session()->push('reservas', [
            'tipo' => 'traslado',
            'reserva' => [
              'detalle' => $reserva->load('traslado')
            ]
        ]);

        return redirect('/cart')->with($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaTraslado $reservaTraslado)
    {
        return $reservaTraslado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservaTraslado $reservaTraslado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservaTraslado $reservaTraslado)
    {

        $reservaTraslado->fill($this->validate($request, [
            'fecha_reserva' => 'required',
            'descuento' => 'required',
            'costo' => 'required',
            'asiento_avion_id' => 'required',
            'tramo_id' => 'required',
            'orden_compra_id' => 'required'
        ]))->save();

        return $reservaTraslado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservaTraslado  $reservaTraslado
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaTraslado $reservaTraslado)
    {
        $reservaTraslado->delete();

        return ReservaTraslado::all();
    }
}
