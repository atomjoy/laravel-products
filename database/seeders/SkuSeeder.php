<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Sku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product 1

        // S-Blue
        $sku = Sku::create([
            'price' => 500,
            'sku' => 'sku-100',
            'product_id' => 1,
            'stock_quantity' => 5
        ]);

        // Size, Color
        $sku->attributes()->attach(1, ['property_id' => 1]);
        $sku->attributes()->attach(2, ['property_id' => 3]);

        // Blue
        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_blue_1.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_blue_2.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_blue_3.jpg';
        $sku->images()->save($img);

        // S-Red
        $sku = Sku::create([
            'price' => 600,
            'sku' => 'sku-200',
            'product_id' => 1,
            'stock_quantity' => 5
        ]);

        // Size, Color
        $sku->attributes()->attach(1, ['property_id' => 1]);
        $sku->attributes()->attach(2, ['property_id' => 4]);

        // Red
        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_red_1.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_red_2.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_red_3.jpg';
        $sku->images()->save($img);

        // M-Blue
        $sku = Sku::create([
            'price' => 700,
            'sku' => 'sku-300',
            'product_id' => 1,
            'stock_quantity' => 6
        ]);

        // Size, Color
        $sku->attributes()->attach(1, ['property_id' => 2]);
        $sku->attributes()->attach(2, ['property_id' => 3]);

        // Blue
        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_blue_1.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_blue_2.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_blue_3.jpg';
        $sku->images()->save($img);

        // M-Red
        $sku = Sku::create([
            'price' => 800,
            'sku' => 'sku-400',
            'product_id' => 1,
            'stock_quantity' => 6
        ]);

        // Size, Color
        $sku->attributes()->attach(1, ['property_id' => 2]);
        $sku->attributes()->attach(2, ['property_id' => 4]);

        // Red
        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_red_1.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_red_2.jpg';
        $sku->images()->save($img);

        $img = new Image();
        $img->url = 'https://raw.githubusercontent.com/atomjoy/laravel-products/refs/heads/main/public/default/koszulka_red_3.jpg';
        $sku->images()->save($img);

        // Product 2

        // Intel-32GB
        $sku = Sku::create([
            'price' => 50000,
            'sku' => 'sku-501',
            'product_id' => 2,
            'stock_quantity' => 3
        ]);

        // Procesor, Ram
        $sku->attributes()->attach(3, ['property_id' => 5]);
        $sku->attributes()->attach(4, ['property_id' => 7]);

        // Intel-64GB
        $sku = Sku::create([
            'price' => 60000,
            'sku' => 'sku-502',
            'product_id' => 2,
            'stock_quantity' => 3
        ]);

        // Procesor, Ram
        $sku->attributes()->attach(3, ['property_id' => 5]);
        $sku->attributes()->attach(4, ['property_id' => 8]);

        // Amd-32GB
        $sku = Sku::create([
            'price' => 50000,
            'sku' => 'sku-601',
            'product_id' => 2,
            'stock_quantity' => 6
        ]);

        // Procesor, Ram
        $sku->attributes()->attach(3, ['property_id' => 6]);
        $sku->attributes()->attach(4, ['property_id' => 7]);

        // Amd-64GB
        $sku = Sku::create([
            'price' => 60000,
            'sku' => 'sku-602',
            'product_id' => 2,
            'stock_quantity' => 6
        ]);

        // Procesor, Ram
        $sku->attributes()->attach(3, ['property_id' => 6]);
        $sku->attributes()->attach(4, ['property_id' => 8]);

        // Product 3

        // AppleA17-32GB
        $sku = Sku::create([
            'price' => 95500,
            'sku' => 'sku-9000',
            'product_id' => 3,
            'stock_quantity' => 13
        ]);

        // Procesor, Ram
        $sku->attributes()->attach(5, ['property_id' => 9]);
        $sku->attributes()->attach(6, ['property_id' => 11]);
    }
}
