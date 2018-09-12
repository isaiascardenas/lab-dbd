<?php

use Faker\Generator as Faker;
use App\Modulos\Paquetes\PaqueteVueloAuto;

$factory->define(PaqueteVueloAuto::class, function (Faker $faker) {
    $reservas_id = DB::table('reserva_autos')->select('id')->get();

    return [
        'descripcion' => $faker->realText(),
        'descuento' => rand(7, 10)/10,
        'reserva_auto_id' => $reservas_id->random()->id,
        'orden_compra_id' => null,
    ];
});
