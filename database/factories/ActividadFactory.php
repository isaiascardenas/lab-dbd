<?php

use App\Actividad;
use Faker\Generator as Faker;

$ciudad_id= DB::table('ciudades')->select('id')->get();

$factory->define(Actividad::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->realText($faker->numberBetween(50,150)),
        'fecha_inicio' => $faker->dateTimeBetween( 'now', '+1 weeks'),
        'fecha_termino' => $faker->dateTimeBetween( '+1 weeks', '+2 weeks'),
        'ciudad_id' => $ciudad_id->random()->id(),
        'max_adultos' => rand(1,10),
        'max_ninos' => rand(1,10),
        'costo_adulto' => rand(10000,20000),
        'costo_nino' => rand(5000,10000),
    ];
});
