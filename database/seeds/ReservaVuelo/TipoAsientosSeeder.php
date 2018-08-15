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
    	['id' => 1, 'descripcion' => 'Económico', 'factor_costo' => 1],
    	['id' => 2, 'descripcion' => 'Turista', 'factor_costo' => 1.2],
    	['id' => 3, 'descripcion' => 'Ejecutivo', 'factor_costo' => 1.5]
    ]);
  }
}
