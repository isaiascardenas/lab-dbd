<?php

use App\Pais;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pais::class, 10)->create();
    }
}
