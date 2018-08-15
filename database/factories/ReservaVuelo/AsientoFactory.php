<?php

use Faker\Generator as Faker;
use App\Modulos\ReservaVuelo\Asiento;

$factory->define(Asiento::class, function (Faker $faker) {
    $tipoAsientos = DB::table('tipo_asiento')->select('id')->get();

    $asientoFila = 'A';
    $asientoCol = 1;

    $asientos = [];
    for ($i=0; $i < 2000; $i++) { 
      $asientos[] = [
        'codigo'=> $asientoFila.$asientoCol,
        'tipo_asiento_id' => $tipoAsientos->random()->id()
      ];

      $asientoCol++;
      if ($asientoCol == 5) {
        $asientoCol = 1;
        $asientoFila++;
      }

      // 5 filas con 4 asientos por fila => 20 asientos por avion
      if ($asientoFila == 'F') {
        $asientoFila = 'A';
      }
    }

    return $asientos;
});
