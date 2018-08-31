<?php

namespace App\Http\Controllers\ReservaAuto;

use Illuminate\Http\Request;
use App\Modulos\ReservaAuto\Auto;
use App\Http\Controllers\Controller;

class AutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modulos.ReservaAuto.form', ['autos' => Auto::all()]);
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
        return Auto::create($this->validate($request, [
            'patente' => 'required',
            'descripcion' => 'required',
            'precio_hora' => 'required',
            'capacidad' => 'required',
            'sucursal_id' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        return $auto;
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
    public function update(Request $request, Auto $auto)
    {
        $auto->fill($this->validate($request, [
            'patente' => 'required',
            'descripcion' => 'required',
            'precio_hora' => 'required',
            'capacidad' => 'required',
            'sucursal_id' => 'required',
        ]))->save();
        return $auto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $auto->delete();
        return Auto::all();
    }
}
