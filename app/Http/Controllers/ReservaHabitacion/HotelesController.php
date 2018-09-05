<?php

namespace App\Http\Controllers\ReservaHabitacion;

use App\Modulos\ReservaHabitacion\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = Hotel::all();
        return view('modulos.ReservaHabitacion.hoteles.index', compact("hoteles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.ReservaHabitacion.hoteles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotelData = $this->validate($request , 
            [

        'estrellas' => 'required',
        'nombre' => 'required' ,
        'descripcion' => 'required',
        'ciudad_id' => 'required' 
        ]);

        $hotel = Hotel::create($hotelData);

        if ($hotel instanceof \Illuminate\Database\Eloquent\Model) {
        $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/hoteles')->with($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        
        if ($hotel instanceof \Illuminate\Database\Eloquent\Model) {
            return view('modulos.ReservaHabitacion.hoteles.show', compact('hotel'));
        } else {
          $response = ['error' => 'No existe la id solicitada'];
          return redirect('/hoteles')->with($response);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        
         

        if ($hotel->exists()) {
            return view('modulos.ReservaHabitacion.hoteles.edit', compact('hotel'));
        } else {
          $response = ['error' => 'No es posible editar una id que no existe'];
          return redirect('/hoteles')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        
        $this->validate($request , [

        'estrellas' => 'required|integer',
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
        'ciudad_id' => 'required|integer' 
        ]);


        $hotel->estrellas = $request->get('estrellas');
        $hotel->nombre = $request->get('nombre');
        $hotel->descripcion = $request->get('descripcion');
        $hotel->ciudad_id = $request->get('ciudad_id');

        $dataUpdate = $hotel->save();

        if ($dataUpdate) 
        {
            $response = ['success' => 'Actualizado con éxito!'];
        } 
        else 
        {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/hoteles/'.$hotel->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        
        $response = [];
        try {
          $hotel->delete();
          $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
          $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/hoteles')->with($response);
    }
}
