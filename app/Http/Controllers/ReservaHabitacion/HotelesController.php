<?php

namespace App\Http\Controllers\ReservaHabitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\ReservaHabitacion\Hotel;

class HotelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hotel::all();
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
        $hotelData = $this->validate($request , [

        'estrellas' => 'required'| 'integer',
        'nombre' => 'required' | 'string',
        'descripcion' => 'required' | 'string',
        'ciudad_id' => 'required'| 'integer' 
        ]);

        return Hotel::create($hotelData);

        //return redirect('/hoteles/')->with('success', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return $hotel;
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
    public function update(Request $request,Hotel $hotel)
    {
        $this->validate($request , [

        'estrellas' => 'required'| 'integer',
        'nombre' => 'required' | 'string',
        'descripcion' => 'required' | 'string',
        'ciudad_id' => 'required'| 'integer' 
        ]);


        $hotel->estrellas = $request->get('estrellas');
        $hotel->nombre = $request->get('nombre');
        $hotel->descripcion = $request->get('descripcion');
        $hotel->ciudad_id = $request->get('ciudad_id');

        $hotel->save();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return Hotel::all();
    }
}
