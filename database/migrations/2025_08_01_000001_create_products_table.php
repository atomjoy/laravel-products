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
        Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug')->nullable()->default('product-' . uniqid());
			$table->text('description')->nullable()->default('');
			$table->unsignedTinyInteger('on_stock')->nullable()->default(1);
			$table->unsignedTinyInteger('is_available')->nullable()->default(1);
			$table->unsignedInteger('sorting')->nullable()->default(0);
            $table->unsignedBigInteger('views')->nullable()->default(0);
			$table->timestamps();
			$table->unique('name');
			$table->unique('slug');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
