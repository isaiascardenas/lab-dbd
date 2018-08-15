<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\Auto;

$factory->define(Auto::class, function (Faker $faker) {
    $sucursales_id = DB::table('sucursales')->select('id')->get();

    return [
        'patente' =>  str_random(4) . rand(10, 99),
        'descripcion' => $faker->realText($faker->numberBetween(10,20)),
        'precio_hora' => rand(5000, 15000),
        'capacidad' => rand(1,10),
        'sucursal_id' => $sucursales_id->random()->id,
    ];
});
