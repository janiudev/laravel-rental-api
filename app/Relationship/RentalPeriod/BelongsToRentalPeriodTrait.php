<?php

namespace App\Relationship\RentalPeriod;

use App\Models\RentalPeriod;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToRentalPeriodTrait
{
    public function rentalPeriod(): BelongsTo
    {
        return $this->belongsTo(RentalPeriod::class);
    }
}
