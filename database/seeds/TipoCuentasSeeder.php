<?php

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
      DB::table('tipo_cuentas')->insert([
  			['descripcion' => 'Cuenta Corriente'],
  			['descripcion' => 'Cuenta Vista'],
  			['descripcion' => 'Credito'],	
      ]);
    }
}
