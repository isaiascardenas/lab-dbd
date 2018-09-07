<?php

namespace App\Http\Controllers\Paquetes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modulos\Paquetes\PaqueteVueloAuto;

class PaqueteVueloAutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paqueteVueloAutos = PaqueteVueloAuto::all();
        return view('modulos.Paquetes.vueloAuto.index', compact('paqueteVueloAutos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.Paquetes.vueloAuto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paqueteVueloAutoData = $this->validate($request, [
        'descripcion' => 'required',
        'descuento' => 'required',
        'reserva_auto_id' => 'required',
        'orden_compra_id' => 'required',
        ]);

        $paqueteVueloAuto = PaqueteVueloAuto::create($paqueteVueloAutoData);

        if ($paqueteVueloAuto->exists()) {
        $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/paqueteVueloAutos')->with($response);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaqueteVueloAuto $paqueteVueloAuto)
    {
        if ($paqueteVueloAuto->exists()) {
            return view('modulos.Paquetes.vueloAuto.show', compact('paqueteVueloAuto'));
        } else {
          $response = ['error' => 'No existe la id solicitada'];
          return redirect('/paqueteVueloAutos')->with($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PaqueteVueloAuto $paqueteVueloAuto)
    {
        if ($paqueteVueloAuto->exists()) {
            return view('modulos.Paquetes.vueloAuto.edit', compact('paqueteVueloAuto'));
        } else {
          $response = ['error' => 'No es posible editar una id que no existe'];
          return redirect('/paqueteVueloAutos')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PaqueteVueloAuto $paqueteVueloAuto)
    {
     
        

        $this->validate($request, [
        'descripcion' => 'required',
        'descuento' => 'required',
        'reserva_auto_id' => 'required',
        'orden_compra_id' => 'required',
        ]);

        $paqueteVueloAutos->descripcion = $request->get('descripcion');
        $paqueteVueloAutos->descuento = $request->get('descuento');
        $paqueteVueloAutos->reserva_auto_id = $request->get('reserva_auto_id');
        $paqueteVueloAutos->orden_compra_id = $request->get('orden_compra_id');

        $dataUpdate = $paqueteVueloAutos->save();

        if ($dataUpdate) 
        {
            $response = ['success' => 'Actualizado con éxito!'];
        } 
        else 
        {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/paqueteVueloAutos/'.$paqueteVueloAuto->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaqueteVueloAuto $paqueteVueloAuto)
    {
        $response = [];
        try {
          $paqueteVueloAuto->delete();
          $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
          $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/paqueteVueloAutos')->with($response);
    }
}
