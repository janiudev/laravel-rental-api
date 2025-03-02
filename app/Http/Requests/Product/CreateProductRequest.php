<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class CreateProductRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'sku' => 'required|string|unique:products,sku',
            'description' => 'nullable|string',
            'attributes' => 'required|array',
            'attributes.*' => 'required|integer|exists:attribute_values,id',
            'pricing' => 'required|array',
            'pricing.*.region_id' => 'required|exists:regions,id',
            'pricing.*.rental_period_id' => 'required|exists:rental_periods,id',
            'pricing.*.price' => 'required|decimal:0,2',
        ];
    }
}
