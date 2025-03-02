<?php

namespace App\Relationship\ProductPricing;

use App\Models\ProductPricing;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyProductPricingTrait
{
    public function pricing(): HasMany
    {
        return $this->hasMany(ProductPricing::class);
    }
}
