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
            LocalizacionesSeeder::class,
            // CompaniasSeeder::class,
            // Agregar aqui las clases Seeder
        ]);
    }
}
