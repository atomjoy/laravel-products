<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Sku extends Model
{
	/** @use HasFactory<\Database\Factories\SkuFactory> */
	// use HasFactory;

	protected $with = ['attributes', 'images', 'product'];

	protected $guarded = [];

	protected function casts(): array
	{
		return [
			'created_at' => 'datetime:Y-m-d H:i:s',
		];
	}

	public function product(): BelongsTo
	{
		return $this->belongsTo(Product::class, 'product_id');
	}

	public function attributes(): BelongsToMany
	{
		return $this->belongsToMany(Attribute::class, 'attribute_sku')->using(AttributeSku::class)->withPivot('property_id');
		// return $this->belongsToMany(Attribute::class, 'attribute_sku')->using(AttributeSku::class)->as('pivot')->withPivot('property_id');
	}

	public function images(): MorphMany
	{
		return $this->morphMany(Image::class, 'imageable')->chaperone();
	}

	public function latestImage(): MorphOne
	{
		return $this->morphOne(Image::class, 'imageable')->latestOfMany();
	}

	public function oldestImage(): MorphOne
	{
		return $this->morphOne(Image::class, 'imageable')->oldestOfMany();
	}

	public function bestImage(): MorphOne
	{
		return $this->morphOne(Image::class, 'imageable')->ofMany('likes', 'max');
	}
}
