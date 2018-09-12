<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;

$factory->define(ReservaHabitacion::class, function (Faker $faker) {
    $habitacion_id = DB::table('habitaciones')->select('id')->get();

    return [
        'fecha_inicio' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 weeks', $timezone = null),
        'fecha_termino' => $faker->dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
        'fecha_reserva' => $faker->dateTime($max = 'now'),
        'costo' => rand(50000,200000),
        'descuento' => 1,
        'habitacion_id' => $habitacion_id->random()->id,
        'orden_compra_id' => null
    ];
});
