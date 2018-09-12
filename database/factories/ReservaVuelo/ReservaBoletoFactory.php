<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\ReservaBoleto;

$factory->define(ReservaBoleto::class, function (Faker $faker) {
    $asientos_id = DB::table('asiento_avion')->select('id')->get();
    $tramos_id = DB::table('tramos')->select('id')->get();

    return [
        'fecha_reserva' => $faker->dateTime($max = 'now'),
        'costo' => rand(50000,200000),
        'descuento' => 1,
        'asiento_avion_id' => $asientos_id ->random()->id,
        'tramo_id' => $tramos_id->random()->id,
        'orden_compra_id' => null
    ];
});
