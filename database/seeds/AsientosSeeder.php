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
    factory(Asiento::class, 1)->create();
  }
}
