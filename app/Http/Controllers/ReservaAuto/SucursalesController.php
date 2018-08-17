<?php

namespace App\Http\Controllers\ReservaAuto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaAuto\Sucursal;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sucursal::all();
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
        return Sucursal::create($this->validate($request, [
            'compania_id' => 'required',
            'ciudad_id' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Sucursal::find($id);
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
        $sucursal = Sucursal::find($id);
        $sucursal->fill($this->validate($request, [
            'nombre' => 'required',
        ]))->save();

        return $sucursal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->delete();
        return Sucursal::all();
    }
}
