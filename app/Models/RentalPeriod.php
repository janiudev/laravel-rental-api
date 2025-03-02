<?php

namespace App\Models;

use App\Values\Enum\PeriodUnitEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalPeriod extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $casts = [
        'unit' => PeriodUnitEnum::class
    ];

    protected $fillable = ['duration', 'unit', 'active'];
}
