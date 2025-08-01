<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Size
        Property::create([
            'attribute_id' => 1,
            'name' => 'S'
        ]);

        Property::create([
            'attribute_id' => 1,
            'name' => 'M'
        ]);

        // Color
        Property::create([
            'attribute_id' => 2,
            'name' => 'Blue'
        ]);

        Property::create([
            'attribute_id' => 2,
            'name' => 'Red'
        ]);

        // Procesor
        Property::create([
            'attribute_id' => 3,
            'name' => 'Intel'
        ]);

        Property::create([
            'attribute_id' => 3,
            'name' => 'Amd'
        ]);

        // Ram
        Property::create([
            'attribute_id' => 4,
            'name' => '32GB'
        ]);

        Property::create([
            'attribute_id' => 4,
            'name' => '64GB'
        ]);
    }
}
