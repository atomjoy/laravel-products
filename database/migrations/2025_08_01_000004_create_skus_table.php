<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Product variants
		Schema::create('skus', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('price')->default(0);
			$table->string('sku');
			$table->unsignedBigInteger('stock_quantity')->nullable()->default(1);
			$table->unsignedTinyInteger('on_stock')->nullable()->default(1);
			$table->unsignedTinyInteger('is_available')->nullable()->default(1);
			$table->timestamps();
			$table->unique('sku');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
		});

		// Pivot table product variants and attributes
		Schema::create('attribute_sku', function (Blueprint $table) {
			$table->id('id');
			$table->foreignId('attribute_id')->constrained('attributes')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('sku_id')->constrained('skus')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('property_id')->constrained('properties')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
			$table->unique(['attribute_id', 'sku_id', 'property_id']);
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_sku');
        Schema::dropIfExists('skus');
    }
};
