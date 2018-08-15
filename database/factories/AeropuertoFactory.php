<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Aeropuerto;

$factory->define(Aeropuerto::class, function (Faker $faker) {
    return [
        'codigo' => $faker->unique()->regexify('[A-Z]{3}'),
        'nombre' => $faker->name,
        'direccion' => $faker->address,
        'localizacion_id' => $faker->numberBetween(1, 150)
    ];
});
