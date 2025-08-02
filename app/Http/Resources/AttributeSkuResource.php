<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeSkuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'attribute_id' => $this->attribute_id,
            'sku_id' => $this->sku_id,
            'property_id' => $this->property_id,
            'property' => new PropertyResource($this->property)
        ];

        // return parent::toArray($request);
    }
}
