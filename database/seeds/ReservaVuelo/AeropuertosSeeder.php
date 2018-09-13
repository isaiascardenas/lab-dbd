<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaVuelo\Aeropuerto;

class AeropuertosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(Aeropuerto::class, 10)->create();

    Aeropuerto::create([
    	'id'=>555,
        'codigo' => 'ZZZ',
        'nombre' => 'Aeropuerto_prueba',
        'direccion' => 'Calle Prueba',
        'ciudad_id' => 999]);
  }
}
