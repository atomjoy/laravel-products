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
		// Products
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug')->nullable()->default('product-' . uniqid());
			$table->text('description')->nullable()->default('');
			$table->unsignedTinyInteger('on_stock')->nullable()->default(1);
			$table->unsignedTinyInteger('visible')->nullable()->default(1);
			$table->unsignedInteger('sorting')->nullable()->default(0);
			$table->timestamps();
			$table->unique('name');
			$table->unique('slug');
		});

		// Product attributes
		Schema::create('attributes', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->string('name');
			$table->timestamps();
			$table->unique(['product_id', 'name']);
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
		});

		// Attributes properties
		Schema::create('properties', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('attribute_id');
			$table->string('name');
			$table->timestamps();
			$table->unique(['attribute_id', 'name']);
			$table->foreign('attribute_id')->references('id')->on('attributes')->onUpdate('cascade')->onDelete('cascade');
		});

		// Product variants
		Schema::create('skus', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('price')->default(0);
			$table->string('sku')->nullable()->default('sku-' . uniqid());
			$table->unsignedBigInteger('stock_quantity')->nullable()->default(1);
			$table->unsignedTinyInteger('on_stock')->nullable()->default(1);
			$table->unsignedTinyInteger('visible')->nullable()->default(1);
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

		// Sku images
		Schema::create('images', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('imageable_id');
			$table->string('imageable_type');
			$table->string('url');
			$table->unsignedBigInteger('likes')->nullable()->default(0);
            $table->unsignedTinyInteger('featured')->nullable()->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('images');
		Schema::dropIfExists('attribute_sku');
		Schema::dropIfExists('skus');
		Schema::dropIfExists('properties');
		Schema::dropIfExists('attributes');
		Schema::dropIfExists('products');
	}
};
