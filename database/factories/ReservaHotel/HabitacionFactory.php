<?php

use App\Modulos\ReservaHotel\Habitacion;
use Faker\Generator as Faker;

$factory->define(Habitacion::class, function (Faker $faker) {
    $hotel_id = DB::table('hoteles')->select('id')->get();

    return [
        'descripcion' => $faker->realText(),
        'capacidad_nino' => rand(1,5),
        'capacidad_adulto' => rand(1,5),
        'precio_por_noche' => rand(30000,150000),
        'hotel_id' => $hotel_id->random()->id,
    ];
});
