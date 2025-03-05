<?php

namespace App\Relationship\AttributeValue;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToAttributeValueTrait
{
    public function attribute_value(): BelongsTo
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
