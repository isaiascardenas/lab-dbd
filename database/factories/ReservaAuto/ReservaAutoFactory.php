<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\ReservaAuto;

$factory->define(ReservaAuto::class, function (Faker $faker) {
    $autos_id = DB::table('autos')->select('id')->get();

    return [
        'fecha_inicio' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 weeks', $timezone = null),
        'fecha_termino' => $faker->dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
        'fecha_reserva' => $faker->dateTime($max = 'now'),
        'costo' => rand(50000,200000),
        'descuento' => 1,
        'auto_id' => $autos_id->random()->id,
        'orden_compra_id' => null
    ];
});
