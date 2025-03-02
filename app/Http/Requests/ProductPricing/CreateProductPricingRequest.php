<?php

namespace App\Http\Requests\ProductPricing;

use App\Http\Requests\Request;

class CreateProductPricingRequest extends Request
{
    public function rules(): array
    {
        return [
            'rental_period_id' => 'required|exists:rental_periods,id',
            'region_id' => 'required|exists:regions,id',
            'price' => 'required|decimal:0,2',
        ];
    }
}
