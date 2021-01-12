<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(User::all()) == 0){
            User::create([
                'name' => 'Admin',
                'email' => 'admin@email',
                'role' => 'Admin',
                'password' => bcrypt('admin')
            ]);
        }
    }
}
