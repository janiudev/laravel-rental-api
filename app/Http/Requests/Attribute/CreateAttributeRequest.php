<?php

namespace App\Http\Requests\Attribute;

use App\Http\Requests\Request;

final class CreateAttributeRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:attributes,name',
            'active' => 'required|bool'
        ];
    }
}
