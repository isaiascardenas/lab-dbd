<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\Auto;

$sucursales_id = DB::table('sucursales')->select('id')->get();

$factory->define(Auto::class, function (Faker $faker) {
    return [
        'patente' =>  str_random(4) . rand(10, 99),
        'modelo' => $faker->name,
        'precio_hora' => rand(5000, 15000),
        'capacidad' => rand(1,10),
        'id_sucursal' => $sucursales_id->random()->id(),
    ];
});
