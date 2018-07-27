<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaAuto\Sucursal;

$factory->define(Sucursal::class, function (Faker $faker) {
    return [
        'id_compania' => rand(1,10),
        'id_localizacion' => rand(1,10),
    ];
});
