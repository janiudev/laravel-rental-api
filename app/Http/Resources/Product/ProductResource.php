<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Attribute\AttributeValueResource;
use App\Http\Resources\Resources;
use Illuminate\Http\Request;

class ProductResource extends Resources
{
    public function toArray(Request $request): array
    {
        return [
            ...parent::toArray($request),
            'attributes' => $this->whenLoaded('attributes', fn() => AttributeValueResource::collection($this->attributes->makeHidden('pivot')))
        ];
    }
}
