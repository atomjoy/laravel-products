<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'on_stock' => $this->on_stock,
            'is_available' => $this->is_available,
            'sorting' => $this->sorting,
            'views' => $this->views,
            'created_at' => (string) $this->created_at,
            'skus' => SkuResource::collection($this->skus),
            // 'skus' => $this->skus,
        ];

        // return parent::toArray($request);
    }
}
