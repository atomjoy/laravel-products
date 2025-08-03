<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product 1
        Attribute::create([
            'product_id' => 1,
            'name' => 'Color'
        ]);

        Attribute::create([
            'product_id' => 1,
            'name' => 'Size'
        ]);

        // Product 2
        Attribute::create([
            'product_id' => 2,
            'name' => 'Procesor'
        ]);

        Attribute::create([
            'product_id' => 2,
            'name' => 'Ram'
        ]);

        // Product 3
        Attribute::create([
            'product_id' => 3,
            'name' => 'Procesor Mobile'
        ]);

        Attribute::create([
            'product_id' => 3,
            'name' => 'Ram Mobile'
        ]);
    }
}
