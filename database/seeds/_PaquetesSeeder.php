<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Vuelo;
use App\Modulos\ReservaAuto\ReservaAuto;
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
        $reserva = ReservaAuto::create([
            'fecha_inicio' => request()->session()->get('busqueda.autos.inicio_reserva'),
            'fecha_termino' => request()->session()->get('busqueda.autos.termino_reserva'),
            'fecha_reserva' => Carbon::now()->toDateTimeString(),
            'descuento' => 1,
            'costo' => request()->session()->get('busqueda.autos.costo'),
            'auto_id' => request('auto_id'),
            'orden_compra_id' => null,
        ]);
    }
}
