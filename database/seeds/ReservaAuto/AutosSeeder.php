<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaAuto\Auto;

class AutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Auto::class, 50)->create();
    }
}
