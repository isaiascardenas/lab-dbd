<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Tramo;


$factory->define(Tramo::class, function (Faker $faker) {
    $aeropuertos = DB::table('aeropuertos')->select('id')->get();
    $aviones = DB::table('aviones')->select('id')->get();

    $fecha = Carbon::create(2018, 9, mt_rand(1, 30), mt_rand(0, 24), 0, 0);

    return [
        'codigo'    => $faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
        'fecha_partida' => $fecha,
        'fecha_llegada' => $fecha->copy()->addHours(mt_rand(1,10)),
        'costo'       => rand(50000, 1000000),
        'avion_id'    => $aviones->random()->id,
        'origen_id'   => $aeropuertos->random()->id,
        'destino_id'  => $aeropuertos->random()->id
    ];
});
