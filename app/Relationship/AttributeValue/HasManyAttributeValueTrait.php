<?php

namespace App\Relationship\AttributeValue;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyAttributeValueTrait
{
    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
