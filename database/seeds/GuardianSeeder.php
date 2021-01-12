<?php

use Illuminate\Database\Seeder;
use App\Guardian;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(Guardian::all()) == 0){
            factory(Guardian::class, 10)->create();
        }
    }
}
