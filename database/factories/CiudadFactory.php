<?php

use App\Ciudad;
use Faker\Generator as Faker;

$factory->define(Ciudad::class, function (Faker $faker) {
    $paises_id = DB::table('paises')->select('id')->get();

    return [
        'nombre' => $faker->city,
        'pais_id' => $paises_id->random()->id,
    ];
});
