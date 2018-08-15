<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Asiento;

class AsientosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tipoAsientos = DB::table('tipo_asientos')->select('id')->get();

    $asientoFila = 'A';
    $asientoCol = 1;

    $asientos = [];
    for ($i=1; $i <= 100; $i++) { 
      $asientos[] = [
        'id' => $i,
        'codigo'=> $asientoFila.$asientoCol,
        'tipo_asiento_id' => $tipoAsientos->random()->id
      ];

      $asientoCol++;
      if ($asientoCol == 10) {
        $asientoCol = 1;
        $asientoFila++;
      }

      // 5 filas con 4 asientos por fila => 20 asientos por avion
      if ($asientoFila == 'J') {
        $asientoFila = 'A';
      }
    }

    DB::table('asientos')->insert($asientos);
  }
}
