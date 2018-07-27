<?php

namespace App\Http\Controllers\ReservaVuelo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tramo;

class VuelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	// $this->validate(request(), [
    	// 	'origen_id' 		=> 'required|integer',
    	// 	'destino_id' 		=> 'required|integer',
    	// 	'tipo_vuelo' 		=> 'required|integer|between:0,1',
    	// 	'fecha_ida'			=> 'required|date',
    	// 	'fecha_vuelta' 		=> 'required_if:tipo_vuelo,1|date',
    	// 	'pasajeros_adultos' => 'required|integer',
    	// 	'pasajeros_ninos' 	=> 'required|integer',
    	// 	'tipo_pasaje' 		=> 'required|integer|between:1,3'
    	// ]);
    	
    	// $data["vuelos"] = Tramo::buscarVuelos(request());


    	$data["vuelos"] = Tramo::all()->take(10);

        return view('modulos.ReservaVuelo.vuelos.index', compact("data"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    	dd(request());

        $vuelo = Tramo::find($id);

        return view('modulos.ReservaVuelo.vuelos.show', compact("vuelo"));
    }

    public function reserva(Request $request)
    {
    	// Agrega al carro y redirige a /carta
        return view('cart');
    }
}
