<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Tramo;

class TramosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(Tramo::class, 1000)->create();
    Tramo::create([
        'codigo'    => 'XFS85D',
        'fecha_partida' => Carbon::create(2018,9,20,17,0,0),
        'fecha_llegada' => Carbon::create(2018,9,20,22,0,0),
        'costo'       => 55555,
        'avion_id'    => 1,
        'origen_id'   => 555,
        'destino_id'  => 777,
    ]);

    Tramo::create([
        'codigo'    => 'XFS852',
        'fecha_partida' => Carbon::create(2018,9,25,17,0,0),
        'fecha_llegada' => Carbon::create(2018,9,25,22,0,0),
        'costo'       => 77777,
        'avion_id'    => 1,
        'origen_id'   => 777,
        'destino_id'  => 555,
    ]);
  }
}
