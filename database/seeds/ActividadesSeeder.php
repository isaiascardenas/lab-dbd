<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Actividad::class, 1000)->create();    }
}
