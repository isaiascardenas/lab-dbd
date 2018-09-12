<?php

use Faker\Generator as Faker;
use App\Modulos\Paquetes\PaqueteVueloHotel;

$factory->define(PaqueteVueloHotel::class, function (Faker $faker) {
    $reservas_id = DB::table('reserva_habitaciones')->select('id')->get();

    return [
        'descripcion' => $faker->realText(),
        'descuento' => rand(7, 10)/10,
        'reserva_habitacion_id' => $reservas_id->random()->id,
        'orden_compra_id' => null,
    ];
});
