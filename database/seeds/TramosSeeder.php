<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TramosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tramos')->delete();
    	DB::statement('ALTER SEQUENCE tramos_id_seq RESTART WITH 1');
    	// DB::table('tramos')->truncate();

        $faker = Faker::create();

        for ($i=0; $i < 1000; $i++) { 
        	DB::table('tramos')->insert([
        		'codigo' 		=> $faker->unique()->regexify('[A-Z]{2}[0-9]{3}'),
        		'fecha_partida' => $faker->dateTime(),
        		'fecha_llegada' => $faker->dateTime(),
        		'avion_id' 		=> $faker->numberBetween(1, 100),
        		'origen_id' 	=> $faker->numberBetween(1, 200),
        		'destino_id' 	=> $faker->numberBetween(1, 200),
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	]);
        }
    }
}
