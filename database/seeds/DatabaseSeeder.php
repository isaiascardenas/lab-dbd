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
        UsersSeeder::class,
        PermisosSeeder::class,
        RolesSeeder::class,
        RolPermisoSeeder::class,
        UserRolSeeder::class,
        PaisesSeeder::class,
        CiudadesSeeder::class,

        /* Actividades */
        // ActividadesSeeder::class,

        /* Autos */
        CompaniasSeeder::class,
        SucursalesSeeder::class,
        AutosSeeder::class,

        /* Hoteles */
        // CompaniasSeeder::class,

        /* Vuelos */
        // AeropuertosSeeder::class,
        // AerolineasSeeder::class,
        // AsientosSeeder::class, 
        // AvionesSeeder::class,
        // TipoAsientosSeeder::class,
        // TramosSeeder::class
    ]);
  }
}
