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

        $cupoAdultosActividades = DB::table('ReservaActividad')
                                ->select('actividad_id', DB::raw('SUM(capacidad_adultos) as total_adultos'))
                                ->groupBy('actividad_id')
                                ->havingRaw('SUM(capacidad_adultos) > ?', [2500])
                                ->get();

        $cupoAdultosActividades = = DB::table('ReservaActividad')
                                 ->select(DB::raw('count(capacidad_adultos) as cant_cupos, actividad_id'))
                                 ->groupBy('actividad_id')
                                 ->get();

        $cupoNinosActividades = = DB::table('ReservaActividad')
                                 ->select(DB::raw('count(capacidad_ninos) as cant_cupos, actividad_id'))
                                 ->groupBy('actividad_id')
                                 ->get();



        $actividadesSinCupo = ReservaActividad::where('max_ninos', '<', request('max_ninos'))
            ->orWhereDate('max_adultos', '<', request('max_adultos'))
            ->pluck('actividad_id');

        







        $actividades = Actividad::whereCiudadId(request('ciudad_id'))
            ->where('fecha_inicio', '>', request('fecha_inicio'))
            ->where('fecha_termino', '<=', request('fecha_termino'))
            ->whereNotIn('id', $actividadesSinCupo)
            ->get();

        //session(['fecha_inicio' => request('fecha_inicio') . ':00']);
        //session(['fecha_termino' => request('fecha_termino') . ':00']);

        return view('modulos.ReservaActividad.reservas.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

            $actividades = Actividad::whereActividadId(request('actividad_id'))
            ->get();









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
