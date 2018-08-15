<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\Sucursal;


$factory->define(Sucursal::class, function (Faker $faker) {
    $ciudades_id = DB::table('ciudades')->select('id')->get();
    $companias_id = DB::table('companias')->select('id')->get();

    return [
        'compania_id' => $companias_id->random()->id,
        'ciudad_id' => $ciudades_id->random()->id,
    ];
});
