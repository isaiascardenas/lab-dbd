<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\Sucursal;

$ciudades_id = DB::table('ciudades')->select('id')->get();
$companias_id = DB::table('companias')->select('id')->get();

$factory->define(Sucursal::class, function (Faker $faker) {
    return [
        'compania_id' => $paises_id->random()->id(),
        'ciudad_id' => $paises_id->random()->id(),
    ];
});
