<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Avion;


$factory->define(Avion::class, function (Faker $faker) {
    $aerolineas = DB::table('aerolineas')->select('id')->get();

    return [
        'descripcion' => $faker->realText(100),
        'aerolinea_id' => $aerolineas->random()->id
    ];
});
