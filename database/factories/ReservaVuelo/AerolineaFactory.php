<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Aerolinea;

$factory->define(Aerolinea::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company
    ];
});
