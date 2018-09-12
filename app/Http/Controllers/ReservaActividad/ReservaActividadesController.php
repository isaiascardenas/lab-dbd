<?php

namespace App\Http\Controllers\ReservaActividad;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaActividad\Actividad;
use App\Modulos\ReservaActividad\ReservaActividad;

class ReservaActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fecha = Carbon::createFromFormat('d-m-Y', request('fecha_actividad'))->subDay();

      $actividades = Actividad::where('ciudad_id', request('ciudad_id'))
                        ->whereDate('fecha_inicio', '<=', $fecha->format('Y-m-d'))
                        ->whereDate('fecha_termino', '>=', $fecha->format('Y-m-d'))
                        ->get();

      $actividades = $actividades->filter(function ($actividad) {
          $total_ninos = $actividad->reservaActividades->pluck('capacidad_ninos')->sum();
          $total_ninos = $actividad->reservaActividades->pluck('capacidad_adultos')->sum();
          
          return $actividad->max_ninos >= $total_ninos + request('cantidad_ninos') &&
              $actividad->max_ninos >= $total_ninos + request('cantidad_ninos');
      });

      request()->session()->put('busqueda.actividad', [
        'costo' => 0,
        'cantidad_adultos' => request('cantidad_adultos'),
        'cantidad_ninos' => request('cantidad_ninos')
      ]);

      return view('modulos.ReservaActividad.reservas.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Actividad $actividad)
    {
        $adultos = request()->session()->get('busqueda.actividad.cantidad_adultos');
        $ninos = request()->session()->get('busqueda.actividad.cantidad_ninos');

        request()->session()->put('busqueda.actividad.costo',
            $actividad->costo_adulto * $adultos +
            $actividad->costo_nino * $ninos
        );

        $actividad->load('ciudad');

        return view('modulos.ReservaActividad.reservas.create', compact('actividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = new ReservaActividad([
            'fecha_reserva' => Carbon::now()->toDateTimeString(),
            'capacidad_ninos' => request()->session()->get('busqueda.actividad.cantidad_ninos'),
            'capacidad_adultos' => request()->session()->get('busqueda.actividad.cantidad_adultos'),
            'costo' => request()->session()->get('busqueda.actividad.costo'),
            'descuento' => 1,
            'actividad_id' => request('actividad_id'),
            'orden_compra_id' => null,
        ]);

        if ($reserva) {
            $response = ['success' => 'Añadido al carrito con éxito!'];
        } else {
            $response = ['error' => 'Ups, hubo un problema... intenta de nuevo'];
        }

        request()->session()->push('reservas', [
            'tipo' => 'actividad',
            'reserva' => [
              'detalle' => $reserva->load('actividad.ciudad')
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
        return ReservaActividad::find($id);
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
    public function update(Request $request, $id)
    {
        $reservaactividad = ReservaActividad::find($id);
        $reservaactividad->capacidad_ninos = $request->capacidad_ninos;
        $reservaactividad->capacidad_adultos = $request->capacidad_adultos;
        $reservaactividad->fecha_reserva = $request->fecha_reserva;
        $reservaactividad->save();
        return $reservaactividad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservaactividad = ReservaActividad::find($id);
        $reservaactividad->delete();
        return ReservaActividad::all();
    }
}
