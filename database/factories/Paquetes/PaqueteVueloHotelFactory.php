<?php

use App\PaqueteVueloHotel;
use Faker\Generator as Faker;

$factory->define(PaqueteVueloHotel::class, function (Faker $faker) {
    return [
        
        'descripcion'=>$faker->realText(),
        'descuento'=>rand(0,0.8),
        'reserva_habitacion_id'=>rand(1,50),
        'orden_compra_id'=>rand(1,50)
    ];
});
