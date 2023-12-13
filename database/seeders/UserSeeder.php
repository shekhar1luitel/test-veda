<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // User::truncate();

        User::create([ //make sure there is id = 1  
            'email' => 'admin@gmail.com',
            'username' => 'user1',
            'password' => '$2y$12$X39J3sPYwSChQOO4omY9hOIlippIjlmxxejcwzATgelBJ1Hh9Vrim',//Pa$$w0rd!
        ]);

    }
}
