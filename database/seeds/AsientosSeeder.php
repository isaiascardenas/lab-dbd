<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AsientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asientos')->delete();
    	DB::statement('ALTER SEQUENCE asientos_id_seq RESTART WITH 1');
    	// DB::table('asientos')->truncate();

        $faker = Faker::create();

        $asientoFila = 'A';
		$asientoCol = 1;
		$avionId = 1;
        for ($i=0; $i < 2000; $i++) { 
        	DB::table('asientos')->insert([
        		'costo' 		=> $faker->numberBetween(10000, 50000),
        		'codigo_asiento'=> $asientoFila.$asientoCol,
        		'tipo_asiento_id' => $faker->numberBetween(1, 3),
        		'avion_id' 		=> $avionId,
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	]);

        	$asientoCol++;
        	if ($asientoCol == 5) {
        		$asientoCol = 1;
        		$asientoFila++;
        	}

        	// 5 filas con 4 asientos por fila => 20 asientos por avion
        	if ($asientoFila == 'F') {
        		$asientoFila = 'A';
        		$avionId++;
        	}
        }
    }
}
