<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Modulos\ReservaTraslado\Traslado;

$factory->define(Traslado::class, function (Faker $faker) {
    $aeropuertos_id = DB::table('aeropuertos')->select('id')->get();
    $hoteles_id = DB::table('hoteles')->select('id')->get();

    $fechaPartida = Carbon::createFromTimeStamp($faker->dateTimeBetween('+10 days', '+50 days')->getTimestamp());
    $fechaLlegada = Carbon::createFromFormat('Y-m-d H:i:s', $fechaPartida)->addHours(mt_rand(1,3));

    return [
        'tipo' => rand(0, 1),
        'fecha_inicio' => $fechaPartida,
        'fecha_termino' => $fechaLlegada,
        'aeropuerto_id' => $aeropuertos_id->random()->id,
        'hotel_id' => $hoteles_id->random()->id,
    ];
});
