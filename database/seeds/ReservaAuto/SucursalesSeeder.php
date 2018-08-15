<?php

use Illuminate\Database\Seeder;
use App\Modulos\ReservaAuto\Sucursal;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sucursal::class, 100)->create();
    }
}