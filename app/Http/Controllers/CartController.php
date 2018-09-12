<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\OrdenCompra;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function index()
  {
      $reservas = request()->session()->get('reservas');

      $totalCarro = 0;

      if (count($reservas)) {
        foreach ($reservas as $reserva) {
          $totalCarro += $reserva['reserva']['detalle']->costo;
        }
      }

      $totalCarro = '$ '.number_format($totalCarro, 0, ',', '.');
      
      return view('cart', compact('reservas', 'totalCarro'));
  }

  public function pay()
  {
      //
      // Crear orden de compra.
      //
      \DB::transaction(function(){

        /***** VALIDAR SALDO DE USUARIO ANTES DE HACER CUALQUIER WEA *****/

        $orden = new OrdenCompra([
          'costo_total' => 0,
          'fecha_generado' => Carbon::now(),
          'detalle' => '',
          'user_id' => request()->user()->id
        ]);

        $orden->save();

        //
        // Guardar las reservas en la BD
        //
        $reservas = request()->session()->get('reservas');

        foreach($reservas as $reserva) {
            $reservacion = $reserva['reserva']['detalle'];

            $reservacion->orden_compra_id = $orden->id;
            
            $reservacion->save();
            
            if ($reserva['tipo'] == 'vuelo') {              
                $pasajero = $reserva['reserva']['extra'];
                $pasajero->reserva_boleto_id = $reservacion->id;
                $pasajero->save();   // pasajero
            }

            $orden->costo_total += $reserva['reserva']['detalle']->costo;
        }

        request()->session()->forget('reservas');
      });

      /***** REDIRIGIR A HISTORIAL DE COMPRA *****/
      
      return redirect('/cart')->with('success', 'Orden de compra generada');
  }

  public function remove()
  {
      $reservas = request()->session()->get('reservas');

      unset($reservas[request('reserva_id')]);

      $reservas = request()->session()->put('reservas', $reservas);

      return redirect('/cart')->with('success', 'Reserva Eliminada!');
  }
}
