<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and gadgets',
        ]);
        \App\Models\Category::create([
            'name' => 'Books',
            'description' => 'All kinds of books',
        ]);
        \App\Models\Category::create([
            'name' => 'Clothing',
            'description' => 'Apparel and fashion items',
        ]);
    }
}
