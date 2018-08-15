<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Asiento;

$factory->define(Asiento::class, function (Faker $faker) {
    
    $asientoFila = 'A';
    $asientoCol = 1;
    $avionId = 1;

    $asientos = [];
    for ($i=0; $i < 2000; $i++) { 
      $asientos[] = [
        'costo'     => $faker->numberBetween(10000, 50000),
        'codigo_asiento'=> $asientoFila.$asientoCol,
        'tipo_asiento_id' => $faker->numberBetween(1, 3),
        'avion_id'    => $avionId,
        'created_at'  => $faker->dateTime(),
        'updated_at'  => $faker->dateTime()
      ]);

      $asientoCol++;
      if ($asientoCol == 5) {
        $asientoCol = 1;
        $asientoFila++;
      }

      // 5 filas con 4 asientos por fila => 20 asientos por avion
      if ($asientoFila == 'F') {
        $asientoFila = 'A';
        $avionId++;
      }
    }

    return $asientos;
});
