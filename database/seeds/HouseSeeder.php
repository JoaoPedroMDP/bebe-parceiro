<?php

use Illuminate\Database\Seeder;
use App\House;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(House::all()) == 0){
            factory(House::class, 10)->create();
        }
    }
}
