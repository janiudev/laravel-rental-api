<?php

namespace App\Http\Resources\Attribute;

use App\Http\Resources\Resources;

class AttributeValueResource extends Resources
{
    public function toArray($request): array
    {
        return [
            ...parent::toArray($request),
            'attribute' => $this->whenLoaded('attribute', fn() => new AttributeResource($this->attribute))
        ];
    }
}
