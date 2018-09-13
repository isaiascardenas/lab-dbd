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
        $tipo_traslado = request('tipo_traslado');
        $fecha_inicio = request('fecha_traslado');
        $capacidad = request('capacidad');
        $hotel_id;
        $aeropuerto_id;
        $fecha_limite = Carbon::parse($fecha_inicio)->addDays(1);
        $traslados;
        request()->session()->put('busqueda.traslado.costo_persona' , $capacidad );

        if ($tipo_traslado == 0) {
            
            $hotel_id = request('destino_id_0');
            $aeropuerto_id = request('origen_id_0');
            $fecha_filter = Traslado::whereDate('fecha_inicio', '>=',$fecha_inicio)
                                    ->whereDate('fecha_termino', '<',$fecha_limite)
                                    ->pluck('id');

            $traslados = Traslado::all()->where('tipo',0)
                                        /*->where('capacidad','>=',$capacidad)
                                        ->where('aeropuerto_id',$aeropuerto_id)
                                        ->where('hotel_id',$hotel_id)
                                        ->whereIn('id',$fecha_filter)

                                        //solo para casos de prueba
                                        */
                                        ;
                                
        }
        if ($tipo_traslado == 1) {
            $hotel_id = request('origen_id_1');
            $aeropuerto_id = request('destino_id_1');
            $fecha_filter = Traslado::whereDate('fecha_inicio', '>=',$fecha_inicio)
                                    ->whereDate('fecha_termino', '<',$fecha_limite)
                                    ->pluck('id');

            $traslados = Traslado::all()->where('tipo',1)
                                        /*->where('capacidad','>=',$capacidad)
                                        ->where('aeropuerto_id',$aeropuerto_id)
                                        ->where('hotel_id',$hotel_id)
                                        ->whereIn('id',$fecha_filter);

                                        //Solo para casos de prueba
                                        */
                                      ;
        }

        return view('modulos.ReservaTraslado.reservas.index', compact('traslados'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Traslado $traslado)
    {
        $capacidad_p = request()->session()->get('busqueda.traslado.costo_persona');
        request()->session()->put('busqueda.traslado.costo' , $traslado->precio_persona * $capacidad_p);
        request()->session()->put('busqueda.traslado.id', $traslado->id );

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
            'cantidad_pasajeros' => request()->session()->get('busqueda.traslado.costo_persona'),
            'fecha_reserva'=> Carbon::now(),
            'descuento'=> 1,
            'costo' => request()->session()->get('busqueda.traslado.costo'),
            'traslado_id' => request('id'),
            'orden_compra_id' => null,
        ]);

        if ($reserva) {
            $response = ['success' => 'Añadido al carrito con éxito!'];
        } else {
            $response = ['error' => 'Ups, hubo un problema... intenta de nuevo'];
        }
        /*

        //por preguntar
        request()->session()->push('reservas', [
            'tipo' => 'traslado',
            'reserva' => [
              'detalle' => $reserva->load('traslado')
            ]
        ]);
        */

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
