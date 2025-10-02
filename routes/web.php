<?php

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // return Category::with('parentRecursive', 'skus')->find(12);

    return ProductResource::collection(Product::with('skus')->get());

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

// Custom selectors
Route::get('/shop/{id}', function ($id) {

    // Vat Good (vat round to 0.5 cent)
	// $tax = 17.23;
	// $tax = 17.23499;
	// $tax = 17.734956;
	// $tax = 11.03339;
	// echo number_format($tax, 2) . "</br>";
	// echo round(explode('.', "" . ($tax * 1000))[0] / 1000, 2) . "</br>";

    // Vat Invalid +1 cent
	// $tax = 17.23;
	// $tax = 17.23499;
	// $tax = 17.734956;
	// echo round(round($tax, 3), 2) . "</br>";

	// return Category::with('parentRecursive', 'skus')->find(12);
	// return ProductResource::collection(Product::with('skus')->get());
	// return new ProductResource(Product::with('skus')->find(1));

	// Group attributes
	// $product = Product::with('skus')->oldest('id')->first();
	$product = Product::with('skus')->find($id);
	$attributes = $product->skus->pluck('attributes')->flatten()->groupBy('name')->map(function ($item) {
		return $item->keyBy('pivot.property_id');
	});

	// return $attributes;

	foreach ($attributes as $a) {

		$picker = '';
		$label_name = '';
		foreach ($a as $v) {
			$picker = $v->picker;
			$label_name = $v->name;
		}

		echo "<div>" . $label_name . "</div>";

		if ($picker == 'color') {
			echo '<div class="color-pickers">';
			foreach ($a as $v) {
				$style = '';
				if ($v->pivot->property->value != null) {
					$style = 'display:inline-block; padding:10px; margin: 10px; color: #fff; background: ' . $v->pivot->property->value;
				}
				echo '<div class="color-picker" style="' . $style . '">' . $v->pivot->property->name . "</div>";
			}
			echo '</div>';
		} else if ($picker == 'size') {
			echo '<div class="size-pickers">';
			foreach ($a as $v) {
				echo '<div class="size-picker" style="display:inline-block; border:1px solid #222; padding:10px 20px; margin: 10px;">' . $v->pivot->property->name . "</div>";
			}
			echo '</div>';
		} else {
			echo '<select style="display:inline-block; background: #fff; border:1px solid #222; padding:10px 20px; margin: 10px;">';
			foreach ($a as $v) {
				// echo '<option>' . $v->pivot->property->name . "</option>";
				echo '<option value="' . $v->pivot->property->id . '">' . $v->pivot->property->name . '</option>';
			}
			echo '</select>';
		}
	}

	echo '<div>Variants</div>';

	// Variants attributes
	foreach ($product->skus as $k => $v) {
		echo "Sku: " . $v->sku . " " . number_format(($v->net_price / 100), 2) . "PLN ";
		echo "Sale: " . number_format(($v->net_sale_price / 100), 2) . "PLN ";
		foreach ($v->attributes as $k => $v) {
			echo " " . $v->pivot->property->name . " (" . $v->pivot->property_id . ") ";
		}
		echo "<br>";
	}
});

