<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class ProductListingFilterRequest extends Request
{
    public function rules(): array
    {
        return [
            'region' => 'required|string',
            'period' => 'required|string'
        ];
    }
}
