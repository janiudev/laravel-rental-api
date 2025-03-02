<?php

namespace App\Relationship\AttributeValue;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyAttributeValueTrait
{
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_values');
    }
}
