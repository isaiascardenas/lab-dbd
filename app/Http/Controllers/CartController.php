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
        request()->session()->put('countReservas', count($reservas));

        foreach ($reservas as $reserva) {
          $totalCarro += $reserva['reserva']['detalle']->precio();
        }
      }

      foreach ($cuentas as $cuenta) {
        if ($cuenta->saldo < $totalCarro) {
          $cuenta->bg = 'text-muted';
          $cuenta->disabled = 'disabled';
        }
      }

      $totalCarro = '$ '.number_format($totalCarro, 0, ',', '.');

      return view('cart', compact('reservas', 'totalCarro', 'cuentas'));
    }

    public function pay()
    {
        \DB::beginTransaction();

        try {
            $cuenta = Cuenta::findOrFail(request('cuenta_id'));

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
                // $response = ['error' => 'No tienes saldo suficiente en la cuenta seleccionada'];
                throw new Exception('No tienes saldo suficiente en la cuenta seleccionada');
            }

            $orden->save();

            // actualizar saldo de la cuenta
            $cuenta->saldo -= $orden->costo_total;
            $cuenta->save();

            // limpiar "carro de compras"
            request()->session()->forget('reservas');
            request()->session()->forget('countReservas');
            $response = ['success' => 'Tu compra se ha realizado correctamente!'];
            
            \DB::commit();
        } catch (\Exception $e) {
            $response = ['error' => 'Ha ocurrido un error al realizar el pago'];
            \DB::rollback();
            return redirect('/cart')->with($response);
        }

        /***** REDIRIGIR A HISTORIAL DE COMPRA *****/
        return redirect('/profile/historial')->with($response);
    }

    public function delete()
    {
        $reservas = request()->session()->get('reservas');

        unset($reservas[request('reserva_id')]);

        $reservas = request()->session()->put('reservas', $reservas);

        return redirect('/cart')->with('success', 'Reserva Eliminada!');
    }
}
