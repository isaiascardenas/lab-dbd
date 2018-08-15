<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Tramo;

$factory->define(Tramo::class, function (Faker $faker) {
    $fecha_partida = Carbon::now();
    $fecha_llegada = $faker->addDays();

    return [
        'codigo'    => $faker->unique()->regexify('[A-Z]{2}[0-9]{3}'),
        'fecha_partida' => $fecha_partida,
        'fecha_llegada' => $fecha_llegada,
        'avion_id'    => $faker->numberBetween(1, 100),
        'origen_id'   => $faker->numberBetween(1, 200),
        'destino_id'  => $faker->numberBetween(1, 200)
    ];
});
