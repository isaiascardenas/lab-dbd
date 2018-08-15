<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaHotel\Hotel;

$factory->define(Hotel::class, function (Faker $faker) {
	$ciudad_id = DB::table('ciudades')->select('id')->get();

    return [

        'nombre' => $faker->name,
        'estrellas' => rand(1,5),
        'descripcion' => $faker->realText(rand(20,50)),
        'ciudad_id' => $ciudad_id->random()->id,

    ];
});

