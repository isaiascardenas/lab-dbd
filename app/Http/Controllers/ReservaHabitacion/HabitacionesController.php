<?php

namespace App\Http\Controllers\ReservaHabitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaHabitacion\Habitacion;


class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $habitaciones = Habitacion::all();
        return view('modulos.ReservaHabitacion.habitaciones.index', compact('habitaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoteles = Hotel::all();
        return view('modulos.ReservaHabitacion.habitaciones.create', compact("hoteles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habitacionesData = $this->validate($request, [

            'capacidad_nino' => 'required|integer',
            'capacidad_adulto' => 'required|integer',
            'precio_por_noche' => 'required|integer',
            'descripcion' => 'required|string',
            'hotel_id' => 'required|integer'
        ]);

        $habitacion = Habitacion::create($habitacionesData);

        if ($habitacion->exists()) {
        $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/habitaciones')->with($response);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Habitacion $habitacion)
    {
        if ($habitacion->exists()) {
            return view('modulos.ReservaHabitacion.habitaciones.show', compact('habitacion'));
        } else {
          $response = ['error' => 'No existe la id solicitada'];
          return redirect('/habitaciones')->with($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Habitacion $habitacion)
    {
        if ($habitacion->exists()) {
            return view('modulos.ReservaHabitacion.habitaciones.edit', compact('habitacion'));
        } else {
          $response = ['error' => 'No es posible editar una id que no existe'];
          return redirect('/habitaciones')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        

        $this->validate($request, [
            'capacidad_nino' => 'required|integer',
            'capacidad_adulto' => 'required|integer',
            'precio_por_noche' => 'required|integer',
            'descripcion' => 'required|string',
            'hotel_id' => 'required|integer'
        ]);

        $habitacion->descripcion = $request->get('descripcion');
        $habitacion->capacidad_nino = $request->get('capacidad_nino');
        $habitacion->capacidad_adulto = $request->get('capacidad_adulto');
        $habitacion->precio_por_noche = $request->get('precio_por_noche');
        $habitacion->hotel_id = $request->get('hotel_id');

        $dataUpdate = $habitacion->save();

        if ($dataUpdate) 
        {
            $response = ['success' => 'Actualizado con éxito!'];
        } 
        else 
        {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/habitaciones/'.$habitacion->id.'/edit')->with($response);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitacion $habitacion)
    {
        $response = [];
        try {
          $habitacion->delete();
          $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
          $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/habitaciones')->with($response);
    }
}
