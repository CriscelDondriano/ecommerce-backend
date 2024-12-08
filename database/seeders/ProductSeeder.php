<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'barcode' => '123456789012',
                'name' => 'Smartphone X',
                'description' => 'A powerful smartphone with advanced features.',
                'price' => 699.99,
                'quantity' => 50,
                'category' => 'Mobile',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '234567890123',
                'name' => 'Ultra HD TV',
                'description' => 'A stunning 4K Ultra HD television.',
                'price' => 1299.99,
                'quantity' => 20,
                'category' => 'TV & AV',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '345678901234',
                'name' => 'Gaming Laptop Z',
                'description' => 'High-performance laptop for gaming enthusiasts.',
                'price' => 1999.99,
                'quantity' => 15,
                'category' => 'Laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '456789012345',
                'name' => 'Air Conditioner Pro',
                'description' => 'Efficient cooling system for your home.',
                'price' => 499.99,
                'quantity' => 30,
                'category' => 'Home Appliances',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '567890123456',
                'name' => 'Wireless Earbuds',
                'description' => 'Compact and high-quality wireless audio.',
                'price' => 149.99,
                'quantity' => 100,
                'category' => 'Accessories',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
