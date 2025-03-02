<?php

namespace App\Http\Requests\Region;

use App\Http\Requests\Request;

final class UpdateRegionRequest extends Request
{
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:5|unique:regions,code,' . $this->id,
            'name' => 'required|string',
            'currency' => 'required|string|max:5',
            'active' => 'required|bool'
        ];
    }
}
