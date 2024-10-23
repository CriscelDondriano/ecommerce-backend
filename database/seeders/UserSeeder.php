<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Make sure to import your User model

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a user with specific credentials
        User::create([
            'name' => 'AdminUser',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // Always hash passwords
        ]);

        // You can add more users if needed
        User::create([
            'name' => 'Admin3',
            'email' => 'Admin@example.com',
            'password' => bcrypt('password456'),
        ]);
    }
}
