<?php

namespace App\Http\Controllers\ReservaActividad;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaActividad\Actividad;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::all();
        return view('modulos.ReservaActividad.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('modulos.ReservaActividad.create', compact('ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividades= Actividad::create([$this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'descripcion' => 'required',
            'max_ninos' => 'required',
            'max_adultos' => 'required',
            'costo_nino' => 'required',
            'costo_adulto' => 'required',
            'ciudad_id' => 'required',
        ])]);

        if ($actividades->exists()) {
          $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/actividades')->with($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad  $actividad)

    {
        return view('modulos.ReservaActividad.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad  $actividad)
    {
        $ciudades = Ciudad::all();
        return view('modulos.ReservaActividad.edit', compact('actividad', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        $outcome = $actividad->fill($this->validate($request, [
          'fecha_inicio' => 'required',
          'fecha_termino' => 'required',
          'descripcion' => 'required', 
          'max_ninos' => 'required',
          'max_adultos' => 'required',
          'costo_nino' => 'required',
          'costo_adulto' => 'required',
          'ciudad_id' => 'required'
        ]))->save();

        if ($outcome) {
          $response = ['success' => 'Actualizado con éxito!'];
        } else {
          $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/actividades/'.$actividad->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        $response = [];
    try {
      $actividad->delete();
      $response = ['success' => 'Eliminado con éxito!'];
    } catch (\Exception $e) {
      $response = ['error' => 'Error al eliminar el registro!'];
    }

    return redirect('/actividades')->with($response);
    }
}
