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
        TipoCuentasSeeder::class,
        BancosSeeder::class,
        CuentasSeeder::class,

        /* Actividades */
        ActividadesSeeder::class,
        // ActividadesSeeder::class,

        /* Autos */
        CompaniasSeeder::class,
        SucursalesSeeder::class,
        AutosSeeder::class,

        /* Hoteles */
        HotelesSeeder::class,
        HabitacionesSeeder::class,

        /* Vuelos */
        AeropuertosSeeder::class,
        AerolineasSeeder::class,
        AvionesSeeder::class,
        TipoAsientosSeeder::class,
        AsientosSeeder::class,
        AvionAsientoSeeder::class,
        TramosSeeder::class,

        /* Traslados */
        TrasladosSeeder::class,
    ]);
  }
}
