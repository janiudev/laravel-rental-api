<?php

namespace App\Http\Requests\Attribute;

use App\Http\Requests\Request;

final class UpdateAttributeRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:attributes,name,' . $this->id,
            'active' => 'required|bool'
        ];
    }
}
