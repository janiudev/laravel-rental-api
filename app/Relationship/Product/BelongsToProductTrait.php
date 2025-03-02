<?php

namespace App\Relationship\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToProductTrait
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
