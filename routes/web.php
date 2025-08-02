<?php

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // return Category::with('parentRecursive', 'skus')->find(12);

    $product = Product::with('skus')->find(1);

    return new ProductResource($product);

    // Group attributes
    $attributes = $product->skus->pluck('attributes')->flatten()->groupBy('name')->map(function ($item) {
	    return $item->keyBy('pivot.property_id');
    });

    // return $attributes;

    foreach ($attributes as $a) {
        echo "<select>";
        foreach ($a as $v) {
            echo "<option>" . $v->pivot->property->name . "</option>";
        }
        echo "</select>";
    }
    echo "<br>";

    // Variants attributes
    foreach ($product->skus as $k => $v) {
        echo "Sku: " . $v->sku . " ";
        foreach ($v->attributes as $k => $v) {
            echo $v->pivot->property->name . " ";
        }
        echo "<br>";
    }
});
