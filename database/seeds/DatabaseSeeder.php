<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressSeeder::class);
        $this->call(HouseSeeder::class);
        $this->call(GuardianSeeder::class);
        $this->call(BabySeeder::class);
        $this->call(UserSeeder::class);
    }
}
