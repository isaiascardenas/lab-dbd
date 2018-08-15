<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\Compania;

$factory->define(Compania::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->company,
    ];
});
