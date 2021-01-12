<?php

use Illuminate\Database\Seeder;
use App\Baby;

class BabySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(Baby::all()) == 0){
            factory(Baby::class, 10)->create();
        }
    }
}
