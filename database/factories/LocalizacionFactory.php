<?php

use App\Localizacion;
use Faker\Generator as Faker;

$factory->define(Localizacion::class, function (Faker $faker) {
    return [
        'pais' => $faker->randomElement([
            'Chile',
            'Colombia',
            'Argentina',
            'Brazil',
            'Rusia',
            'China',
            'Japón',
            'Canada',
            'Estados Unidos',
            'India',
            'Francia',
            'Italia'
        ]),
        'ciudad' => $faker->city,
    ];
});
