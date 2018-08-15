<?php

use Faker\Generator as Faker;
use App\Hotel;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->name,
        'estrellas' =>rand(1,5),
        'descripcion' =>$faker->realText(),
        'ciudad_id' =>rand(1,150)
    ];
});

