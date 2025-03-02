<?php

namespace App\Relationship\Region;

use App\Models\Region;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToRegionTrait
{
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
