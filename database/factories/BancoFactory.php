<?php

use Faker\Generator as Faker;

$factory->define(App\Banco::class, function (Faker $faker) {
    return [
        'nombre' =>  $faker->company,
    ];
});
