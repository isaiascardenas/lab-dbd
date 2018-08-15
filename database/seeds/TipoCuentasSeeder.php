<?php

use App\TipoCuenta
use Illuminate\Database\Seeder;

class TipoCuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCuenta::create([
			['descripcion' => 'Cuenta Corriente'],
			['descripcion' => 'Cuenta Vista'],
			['descripcion' => 'Credito'],	
        ]);
    }
}
