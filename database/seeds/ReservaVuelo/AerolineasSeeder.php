<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Aerolinea;

class AerolineasSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(Aerolinea::class, 10)->create();
  }
}
