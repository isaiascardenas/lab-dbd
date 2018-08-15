<?php

use Faker\Generator as Faker;
use App\Habitacion;

$factory->define(Habitacion::class, function (Faker $faker) {
    return [
        'descripcion'=>$faker->realText(),
        'capacidad_nino'=>rand(1,5),
        'capacidad_adulto'=>rand(1,5),
        'precio_por_noche'=>rand(30000,150000),
        'hotel_id'=>rand(1,50)
    ];
});
