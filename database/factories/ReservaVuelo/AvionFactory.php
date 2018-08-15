<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Avion;

$factory->define(Avion::class, function (Faker $faker) {
    return [
        'modelo' => $faker->unique()->regexify('[A-Z]{6}[0-9]{3}'),
        'aerolinea_id' => $faker->numberBetween(1, 10)
    ];
});
