<?php

namespace App\Http\Controllers\ReservaAuto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaAuto\Compania;

class CompaniasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companias = Compania::all();
        return view('modulos.ReservaAuto.companias.index', compact('companias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.ReservaAuto.companias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compania = Compania::create($this->validate($request, [
            'nombre' => 'required',
        ]));

        if ($compania->exists()) {
            $response = ['success' => 'Creado con éxito!'];
        } else {
            $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/companias')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Compania $compania)
    {
        return view('modulos.ReservaAuto.companias.show', compact('compania'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Compania $compania)
    {
        return view('modulos.ReservaAuto.companias.edit', compact('compania'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compania $compania)
    {
        $outcome = $compania->fill($this->validate($request, [
            'nombre' => 'required',
        ]))->save();

        if ($outcome) {
            $response = ['success' => 'Actualizado con éxito!'];
        } else {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/companias/'.$compania->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compania $compania)
    {
        $response = [];
        try {
            $compania->delete();
            $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
            $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/companias')->with($response);
    }
}
