<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\TipoAsiento;


class TipoAsientosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    TipoAsiento::insert([
    	['id' => 1, 'descripcion' => 'Económico'],
    	['id' => 2, 'descripcion' => 'Turista'],
    	['id' => 3, 'descripcion' => 'Ejecutivo']
    ]);
  }
}
