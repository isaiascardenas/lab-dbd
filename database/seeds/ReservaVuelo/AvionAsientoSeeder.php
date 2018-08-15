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

    $avion_asiento = [];

    foreach ($aviones as $avionId) {
      foreach ($asientos as $asientoId) {
        $avion_asiento[] = ['avion_id' => $avionId, 'asiento_id' => $asientoId];
      }
    }
    // dd($avion_asiento);
    DB::table('avion_asiento')->insert($avion_asiento);
  }
}
