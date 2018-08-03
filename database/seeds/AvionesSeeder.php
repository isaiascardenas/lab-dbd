<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AvionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aviones')->delete();
    	DB::statement('ALTER SEQUENCE aviones_id_seq RESTART WITH 1');
    	// DB::table('aviones')->truncate();

        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
        	DB::table('aviones')->insert([
        		'modelo' 		=> $faker->unique()->regexify('[A-Z]{6}[0-9]{3}'),
        		'aerolinea_id' 	=> $faker->numberBetween(1, 10),
        		'created_at' 	=> $faker->dateTime(),
        		'updated_at' 	=> $faker->dateTime()
        	]);
        }
    }
}
