<?php

namespace App\Http\Controllers;

use App\Cuenta;
use Carbon\Carbon;
use App\OrdenCompra;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $reservas = request()->session()->get('reservas');
        $cuentas = request()->user()->cuentas->load('banco', 'tipoCuenta');

        $totalCarro = 0;


      if (count($reservas)) {
        foreach ($reservas as $reserva) {
          $totalCarro += $reserva['reserva']['detalle']->precio();
        }
      }

      $totalCarro = '$ '.number_format($totalCarro, 0, ',', '.');

      return view('cart', compact('reservas', 'totalCarro', 'cuentas'));
    }

    public function pay()
    {
        \DB::beginTransaction();

        try {
            $cuenta = Cuenta::find(request('cuenta_id'));

            $orden = new OrdenCompra([
                'costo_total' => 0,
                'fecha_generado' => Carbon::now(),
                'detalle' => '',
                'user_id' => request()->user()->id
            ]);

            $orden->save();

            $reservas = request()->session()->get('reservas');

            foreach($reservas as $reserva) {
                $reservacion = $reserva['reserva']['detalle'];
                $reservacion->orden_compra_id = $orden->id;
                $reservacion->save();

                if ($reserva['tipo'] == 'vuelo') {
                    $pasajero = $reserva['reserva']['extra'];
                    $pasajero->reserva_boleto_id = $reservacion->id;
                    $pasajero->save();
                }

                $orden->costo_total += $reserva['reserva']['detalle']->costo;
            }

            if ($orden->costo_total > $cuenta->saldo) {
                $response = ['error' => 'No tienes saldo suficiente en la cuenta seleccionada'];
                \DB::rollback();
            } else {
                $orden->save();
                request()->session()->forget('reservas');
                $response = ['success' => 'Tu compra se ha realizado correctamente!'];
                \DB::commit();
            }
        } catch (\Exception $e) {
            $response = ['error' => 'Ha ocurrido un error al realizar el pago'];
            \DB::rollback();
        }

        /***** REDIRIGIR A HISTORIAL DE COMPRA *****/
        return redirect('/cart')->with($response);
    }

    public function delete()
    {
        $reservas = request()->session()->get('reservas');

        unset($reservas[request('reserva_id')]);

        $reservas = request()->session()->put('reservas', $reservas);

        return redirect('/cart')->with('success', 'Reserva Eliminada!');
    }
}
