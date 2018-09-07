<?php

namespace App\Http\Controllers\ReservaHabitacion;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaHabitacion\Habitacion;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;

class ReservaHabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $request_destino = request('destino_id');
        $request_fecha_inicio = request('fecha_entrada');
        $request_fecha_termino = request('fecha_salida');
        $request_adultos = request('capacidad_adultos');
        $request_ninos = request('capacidad_ninos');
        $request_estrellas = request('estrellas');

        $hoteles = Hotel::where('ciudad_id', $request_destino)
                          ->where('estrellas', $request_estrellas)
                          ->pluck('id');

        $habitacionesNoDisp = ReservaHabitacion::whereDate('fecha_inicio', '<', $request_fecha_termino)
                          ->whereDate('fecha_termino', '>', $request_fecha_inicio)
                          ->pluck('habitacion_id');


        $habitacionDisp = Habitacion::all()->whereIn('hotel_id', $hoteles)
                          ->where('capacidad_adulto', '>=', $request_adultos)
                          ->where('capacidad_nino', '>=', $request_ninos)
                          ->whereNotIn('id',$habitacionesNoDisp);

        request()->session()->put('busqueda.hoteles', [
          'costo' => 0,
          'inicio_reserva' => $request_fecha_inicio . ':00',
          'termino_reserva' => $request_fecha_termino . ':00'
        ]);

        return view('modulos.ReservaHabitacion.reservas.index', compact('habitacionDisp','request_fecha_inicio','request_fecha_termino'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservar(Habitacion $habitacion)
    {
        $inicio = Carbon::createFromFormat('Y-m-d H:m:s', request()->session()->get('busqueda.hoteles.inicio_reserva'));
        $termino = Carbon::createFromFormat('Y-m-d H:m:s', request()->session()->get('busqueda.hoteles.termino_reserva'));

        request()->session()->put('busqueda.hoteles.costo', $inicio->diffInHours($termino) * $habitacion->precio_por_noche);
        
        $habitacion->load('hotel');

        return view('modulos.ReservaHabitacion.reservas.create', compact('habitacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = new ReservaHabitacion([
            'fecha_inicio' => request()->session()->get('busqueda.hoteles.inicio_reserva'),
            'fecha_termino' => request()->session()->get('busqueda.hoteles.termino_reserva'),
            'fecha_reserva' => Carbon::now()->toDateTimeString(),
            'descuento' => 1,
            'costo' => request()->session()->get('busqueda.hoteles.costo'),
            'habitacion_id' => request('habitacion_id'),
            'orden_compra_id' => null,
        ]);

        if ($reserva) {
            $response = ['success' => 'Añadido al carrito con éxito!'];
        } else {
            $response = ['error' => 'Ups, hubo un problema... intenta de nuevo'];
        }

        request()->session()->push('reservas', [
            'tipo' => 'hotel',
            'reserva' => [
              'detalle' => $reserva->load('habitacion')
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
    public function show($id)
    {
        return ReservaHabitacion::find($id);
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
    public function update(Request $request,$id)
    {
        $reservaHabitacion = $this->validate($request , [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'fecha_reserva' => 'required',
            'costo' => 'required',
            'descuento' => 'required',
            'habitacion_id' => 'required',
            'orden_compra_id' => 'required'
        ]);

        $reservaHabitacion->fecha_inicio = $request->get('fecha_inicio');
        $reservaHabitacion->fecha_termino = $request->get('fecha_termino');
        $reservaHabitacion->fecha_reserva = $request->get('fecha_reserva');
        $reservaHabitacion->costo = $request->get('costo');
        $reservaHabitacion->descuento = $request->get('descuento');
        $reservaHabitacion->habitacion_id = $request->get('habitacion_id');
        $reservaHabitacion->orden_compra_id = $request->get('orden_compra_id');

        $reservaHabitacion->save();

        return $ReservaHabitacion;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReservaHabitacion::destroy($id);
        return ReservaHabitacion::all();
    }
}
