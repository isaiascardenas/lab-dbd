<?php

use App\PaqueteVueloAuto;
use Faker\Generator as Faker;

$factory->define(PaqueteVueloAuto::class, function (Faker $faker) {
	
    return [
        
        'descripcion'=>$faker->realText(),
        'descuento'=>rand(0,0.8),
        'reserva_auto_id'=>rand(1,50),
        'orden_compra_id'=>rand(1,50)
    ];
});
