<?php

use Faker\Generator as Faker;
use App\ReservaHabitacion;

$factory->define(ReservaHabitacion::class, function (Faker $faker) {
    return [
        'fecha_inicio'=> $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 weeks', $timezone = null),
        'fecha_termino'=> dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
        'fecha_reserva'=> $faker->date($format= 'd-m-Y'),
        'costo'->rand(50000,200000),
        'descuento'=>rand(0,0.7),
        'habitacion_id'=>rand(1,50),
        'orden_compra_id'=>rand(1,50)
    ];
});
