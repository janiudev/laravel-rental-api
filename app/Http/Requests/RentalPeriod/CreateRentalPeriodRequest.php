<?php

namespace App\Http\Requests\RentalPeriod;

use App\Http\Requests\Request;

class CreateRentalPeriodRequest extends Request
{
    public function rules(): array
    {
        return [
            'duration' => 'required|numeric',
            'unit' => 'required|in:day,week,month,year',
            'active' => 'required|bool'
        ];
    }
}
