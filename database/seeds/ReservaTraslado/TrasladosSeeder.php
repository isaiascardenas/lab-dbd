<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaTraslado\Traslado;

class TrasladosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Traslado::class, 1000)->create();
    }
}
