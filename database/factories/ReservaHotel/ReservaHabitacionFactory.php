<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;

$factory->define(ReservaHabitacion::class, function (Faker $faker) {
    $habitacion_id = DB::table('habitaciones')->get()->id;
  
    $fechInicio = Carbon::createFromTimeStamp($faker->dateTimeThisMonth()->getTimestamp());
    $fechaTermino = Carbon::createFromFormat('Y-m-d H:i:s', $fechInicio)->addHours(mt_rand(1,3));

    $fechaReserva = Carbon::createFromFormat('Y-m-d H:i:s', $fechInicio)->subDays(mt_rand(1,14));
    
    return [
        'fecha_inicio'=> $fechInicio,
        'fecha_termino'=> $fechaTermino,
        'fecha_reserva' => $faker->date(),
        'costo' => rand(50000,200000),
        'descuento'=> rand(0,0.7),
        'habitacion_id'=> $habitacion_id->random()->id,
        'orden_compra_id'=>rand(1,50)
    ];
});
