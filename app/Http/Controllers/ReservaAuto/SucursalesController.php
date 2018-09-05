<?php

namespace App\Http\Controllers\ReservaAuto;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaAuto\Sucursal;
use App\Modulos\ReservaAuto\Compania;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::with('compania', 'ciudad')->get();
        return view('modulos.ReservaAuto.sucursales.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all();
        $companias = Compania::all();
        return view('modulos.ReservaAuto.sucursales.create', compact(
            'ciudades',
            'companias'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = Sucursal::create($this->validate($request, [
            'compania_id' => 'required',
            'ciudad_id' => 'required',
        ]));

        if ($sucursal->exists()) {
            $response = ['success' => 'Creado con éxito!'];
        } else {
            $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/sucursales')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        $sucursal->load('compania', 'ciudad');
        return view('modulos.ReservaAuto.sucursales.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        $ciudades = Ciudad::all();
        $companias = Compania::all();
        $sucursal->load('compania', 'ciudad');
        return view('modulos.ReservaAuto.sucursales.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        $outcome = $sucursal->fill($this->validate($request, [
            'compania_id' => 'required',
            'ciudad_id' => 'required',
        ]))->save();

        if ($outcome) {
            $response = ['success' => 'Actualizado con éxito!'];
        } else {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/sucursales/'.$sucursal->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        $response = [];
        try {
            $sucursal->delete();
            $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
            $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/sucursales')->with($response);
    }
}
