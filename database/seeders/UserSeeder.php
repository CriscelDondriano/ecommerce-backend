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
            'role' => 'admin',
            'contact_info' => '1234567890',
        ]);

        // You can add more users if needed
        User::create([
            'name' => 'CustomerUser',
            'email' => 'Customer@example.com',
            'password' => bcrypt('Customer1234'),
            'role' => 'customer',
            'contact_info' => '9876543210',
        ]);
    }
}
