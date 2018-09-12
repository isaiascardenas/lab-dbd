<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;

$factory->define(ReservaHabitacion::class, function (Faker $faker) {

    $habitacion_id = DB::table('habitaciones')->select('id')->get();
  
    $fechaInicio = Carbon::create(2018, 9, mt_rand(1, 30), mt_rand(0, 24), 0, 0);
    $fechaTermino = $fechaInicio->copy()->addHours(mt_rand(1, 48));
    $fechaReserva = $fechaInicio->copy()->subDays(mt_rand(5, 20));
    
    return [
        'fecha_inicio'=> $fechInicio,
        'fecha_termino'=> $fechaTermino,
        'fecha_reserva' => $fechaReserva,
        'costo' => rand(50000,200000),
        'descuento' => 1,
        'habitacion_id' => $habitacion_id->random()->id,
        'orden_compra_id' => null
    ];
});
