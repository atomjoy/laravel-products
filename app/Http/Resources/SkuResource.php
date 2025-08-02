<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkuResource extends JsonResource
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
            'product_id' => $this->product_id,
            'price' => $this->price,
            'sku' => $this->sku,
            'stock_quantity' => $this->stock_quantity,
            'on_stock' => $this->on_stock,
            'attributes' => AttributeResource::collection($this->attributes),
            'images' => ImageResource::collection($this->images),
            // 'product' => $this->product,
        ];

        // return parent::toArray($request);
    }
}
