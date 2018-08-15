<?php

use Faker\Generator as Faker;
use App\ReservaHotel;

$factory->define(ReservaHotel::class, function (Faker $faker) {
    return [
        'fecha_inicio'=> $faker->date($format= 'd-m-Y'),
        'fecha_termino'=> $faker->date($format= 'd-m-Y'),
        'descuento'=>rand(0,70),
        'habitacion_id'=>rand(1,50),
        'orden_compra_id'=>rand(1,50)
    ];
});
