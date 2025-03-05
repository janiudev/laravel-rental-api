<?php

namespace App\Models;

use App\Relationship\AttributeValue\BelongsToAttributeValueTrait;
use App\Relationship\Product\BelongsToProductTrait;
use App\Relationship\Region\BelongsToRegionTrait;
use App\Relationship\RentalPeriod\BelongsToRentalPeriodTrait;
use Illuminate\Database\Eloquent\Model;

class ProductPricing extends Model
{
    use BelongsToProductTrait,
        BelongsToRentalPeriodTrait,
        BelongsToAttributeValueTrait,
        BelongsToRegionTrait;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = ['product_id', 'rental_period_id', 'region_id', 'price'];
}
