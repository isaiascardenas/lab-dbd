<?php

namespace App\Http\Controllers\ReservaAuto;

use Illuminate\Http\Request;
use App\Modulos\ReservaAuto\Auto;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaAuto\Sucursal;

class AutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autos = Auto::all();
        return view('modulos.ReservaAuto.autos.index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Sucursal::with('compania', 'ciudad')->get();
        return view('modulos.ReservaAuto.autos.create', compact('sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auto = Auto::create($this->validate($request, [
            'patente' => 'required',
            'descripcion' => 'required',
            'precio_hora' => 'required',
            'capacidad' => 'required',
            'sucursal_id' => 'required',
        ]));

        if ($auto->exists()) {
            $response = ['success' => 'Creado con éxito!'];
        } else {
            $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/autos')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        $auto->load('sucursal.compania', 'sucursal.ciudad');
        return view('modulos.ReservaAuto.autos.show', compact('auto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        $sucursales = Sucursal::with('compania', 'ciudad')->get();
        return view('modulos.ReservaAuto.autos.edit', compact('auto', 'sucursales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto)
    {
        $outcome = $auto->fill($this->validate($request, [
            'patente' => 'required',
            'capacidad' => 'required',
            'descripcion' => 'required',
            'precio_hora' => 'required',
            'sucursal_id' => 'required',
        ]))->save();

        if ($outcome) {
            $response = ['success' => 'Actualizado con éxito!'];
        } else {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/autos/'.$auto->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $response = [];
        try {
            $auto->delete();
            $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
            $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/autos')->with($response);
    }
}
