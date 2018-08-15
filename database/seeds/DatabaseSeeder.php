<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
        /* General */
        LocalizacionesSeeder::class,
        /* Actividades */
        ActividadesSeeder::class,

        /* Autos */

        /* Hoteles */
        // CompaniasSeeder::class,

        /* Vuelo */
        AeropuertosSeeder::class,
        AerolineasSeeder::class,
        AsientosSeeder::class, 
        AvionesSeeder::class,
        TipoAsientosSeeder::class,
        TramosSeeder::class
    ]);
  }
}
