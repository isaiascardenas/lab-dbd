<?php

use Illuminate\Database\Seeder;

class AvionAsientoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $asientos = DB::table('asientos')->select('id')->get();
    $aviones = DB::table('aviones')->select('id')->get();


    foreach ($aviones as $avion) {
      $avion_asiento = [];
      foreach ($asientos as $asiento) {
        $avion_asiento[] = ['avion_id' => $avion->id, 'asiento_id' => $asiento->id];
      }
      DB::table('avion_asiento')->insert($avion_asiento);
    }

  }
}
