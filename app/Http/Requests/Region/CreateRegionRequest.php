<?php

namespace App\Http\Requests\Region;

use App\Http\Requests\Request;

final class CreateRegionRequest extends Request
{
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:5|unique:regions,code',
            'name' => 'required|string',
            'currency' => 'required|string|max:5',
            'active' => 'required|bool'
        ];
    }
}
