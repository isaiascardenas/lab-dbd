<?php

use App\Modulos\ReservaActividad\actividad;
use Faker\Generator as Faker;

$factory->define(Actividad::class, function (Faker $faker) {
    return [
        'descripcion' =>  $faker->realText($faker->numberBetween(50,150)),
        'fecha_inicio' => $faker->dateTimeBetween( 'now', '+1 weeks'),
        'fecha_termino' => $faker->dateTimeBetween( '+1 weeks', '+2 weeks'),
        'id_localizacion' => rand(1,150),
        'max_adultos' => rand(1,10),
        'max_ninos' => rand(1,10),
        'precio_adulto' => rand(10000,20000),
        'precio_nino' => rand(5000,10000),
    ];
});
