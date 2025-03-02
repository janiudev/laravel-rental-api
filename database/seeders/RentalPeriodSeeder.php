<?php

namespace Database\Seeders;

use App\Models\RentalPeriod;
use App\Values\Enum\PeriodUnitEnum;

class RentalPeriodSeeder extends DatabaseSeeder
{
    public function run(): void
    {
        RentalPeriod::create([
            'duration' => 1,
            'unit' => PeriodUnitEnum::MONTH
        ]);
    }
}
