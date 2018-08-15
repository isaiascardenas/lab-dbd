<?php

use App\Ciudad;
use Faker\Generator as Faker;

$paises_id = DB::table('paises')->select('id')->get();

$factory->define(Ciudad::class, function (Faker $faker) {
    return [
        'nombre' => $faker->city,
        'pais_id' => $paises_id->random()->id(),
    ];
});
