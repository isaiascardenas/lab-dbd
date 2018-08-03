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
        $this->call(AutosSeeder::class);
        $this->call(AerolineasSeeder::class);
        $this->call(AeropuertosSeeder::class);
        $this->call(AsientosSeeder::class);
        $this->call(AvionesSeeder::class);
        $this->call(LocalizacionesSeeder::class);
        $this->call(TipoAsientosSeeder::class);
        $this->call(TramosSeeder::class);
    }
}
