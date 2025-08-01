<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'T-Shirt',
            'slug' => 'product-1',
            'description' => 'T-Shirt description.'
        ]);

        Product::create([
            'name' => 'Laptop',
            'slug' => 'product-2',
            'description' => 'Laptop description.'
        ]);
    }
}
