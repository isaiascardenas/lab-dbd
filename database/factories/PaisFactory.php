<?php

use App\Pais;
use Faker\Generator as Faker;

$factory->define(Pais::class, function (Faker $faker) {
    return [
        'nombre' => $faker->country,
    ];
});
