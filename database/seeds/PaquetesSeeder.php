<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaAuto\ReservaAuto;
use App\Modulos\Paquetes\PaqueteVueloAuto;
use App\Modulos\Paquetes\PaqueteVueloHotel;
use App\Modulos\ReservaVuelo\ReservaBoleto;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;

class PaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservas = ReservaBoleto::get()->split(2);
        $reservasVueloAuto = $reservas->pop()->chunk(2);
        $reservasVueloHotel = $reservas->pop()->chunk(2);

        $paquetesAuto = factory(PaqueteVueloAuto::class, 10)->create();
        $paquetesHotel = factory(PaqueteVueloHotel::class, 10)->create();

        $paquetesAuto->each(function ($paquete) use ($reservasVueloAuto) {
            $reserva = $reservasVueloAuto->pop();

            $paquete->reservaBoletos()->attach($reserva->pop());
            $paquete->reservaBoletos()->attach($reserva->pop());
        });

        $paquetesHotel->each(function ($paquete) use ($reservasVueloHotel) {
            $reserva = $reservasVueloHotel->pop();
            $paquete->reservaBoletos()->attach($reserva->pop());
            $paquete->reservaBoletos()->attach($reserva->pop());
        });
    }
}
