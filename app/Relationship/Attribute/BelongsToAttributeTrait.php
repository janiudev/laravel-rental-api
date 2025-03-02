<?php

namespace App\Relationship\Attribute;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToAttributeTrait
{
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
