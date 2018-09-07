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
        $actividades = Actividad::whereCiudadId(request('ciudad_id'))
            ->when(request('fecha_inicio'), function($query) {
                return $query->whereDate('fecha_inicio', '<=', request('fecha_inicio'))
                             ->whereDate('fecha_termino', '>=', request('fecha_inicio'));
            })
            ->with('ciudad')
            ->get();

        $actividades = $actividades->filter(function ($actividad) {
            $total_ninos = $actividad->reservaActividades->pluck('capacidad_ninos')->sum();
            $total_ninos = $actividad->reservaActividades->pluck('capacidad_adultos')->sum();
            return $actividad->max_ninos >= $total_ninos + request('cantidad_ninos') &&
                $actividad->max_ninos >= $total_ninos + request('cantidad_ninos');
        });


        return view('modulos.ReservaActividad.reservas.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Actividad $actividad)
    {
        $inicio = Carbon::createFromFormat('Y-m-d H:m:s', $actividad->fecha_inicio);
        $termino = Carbon::createFromFormat('Y-m-d H:m:s', $actividad->fecha_termino);

        request()->session()->put('busqueda.autos.costo', $inicio->diffInHours($termino) * $actividad);

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
            'capacidad_ninos' => request('max_ninos'),
            'capacidad_adultos' => request('max_adultos'),
            'descuento' => 1,
            'actividad_id' => request('actividad_id'),
            'orden_compra_id' => null,
        ]);

        if ($reserva) {
            $response = ['success' => 'Añadido al carrito con éxito!'];
            //Actualizando actividad reservada










        } else {
            $response = ['error' => 'Ups, hubo un problema... intenta de nuevo'];
        }

        session([
            'reservas' => [
                [
                    'tipo' => 'actividad',
                    'reserva' => $reserva->load('actividad'),
                ],
            ]
        ]);

        return back()->with($response);
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
