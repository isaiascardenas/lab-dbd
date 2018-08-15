 <?php

use App\Cuenta;
use Illuminate\Database\Seeder;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cuenta::class, 5)->create(); 
    } 
}
