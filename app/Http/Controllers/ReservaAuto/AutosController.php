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
        return Auto::all();
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
        $data = $this->validate($request, [
            'patente' => 'required',
            'descripcion' => 'required',
            'precio_hora' => 'required',
            'capacidad' => 'required',
            'sucursal_id' => 'required',
        ]);
        return Auto::create($data);
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
    public function update(Request $request, $id)
    {
        $auto = Auto::find($id);
        $this->validate($request, [
            'patente' => 'required',
            'descripcion' => 'required',
            'precio_hora' => 'required',
            'capacidad' => 'required',
            'sucursal_id' => 'required',
        ]);
        $auto->patente = request('patente');
        $auto->descripcion = request('descripcion');
        $auto->precio_hora = request('precio_hora');
        $auto->capacidad = request('capacidad');
        $auto->sucursal_id = request('sucursal_id ');
        $auto->save();

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
        return $auto->delete();
    }
}
