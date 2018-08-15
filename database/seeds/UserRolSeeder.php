<?php

use Illuminate\Database\Seeder;

class UserRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_rol')->insert([
            ['user_id' => 1, 'rol_id' => 1],
        ]);
    }
}
