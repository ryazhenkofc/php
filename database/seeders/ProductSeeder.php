<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = \App\Models\Product::create([
            'name' => 'Laptop',
            'description' => 'High-performance laptop for work',
            'price' => 999.99,
        ]);

        $product2 = \App\Models\Product::create([
            'name' => 'T-Shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 29.99,
        ]);

        $product3 = \App\Models\Product::create([
            'name' => 'Programming Book',
            'description' => 'Advanced programming concepts',
            'price' => 49.99,
        ]);

        // Attach categories to products (Many-to-Many)
        $product1->categories()->attach(1); // Electronics
        $product2->categories()->attach(3); // Clothing
        $product3->categories()->attach(2); // Books
    }
}
