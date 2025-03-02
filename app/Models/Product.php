<?php

namespace App\Models;

use App\Relationship\AttributeValue\BelongsToManyAttributeValueTrait;
use App\Relationship\ProductPricing\HasManyProductPricingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,
        BelongsToManyAttributeValueTrait,
        HasManyProductPricingTrait,
        SoftDeletes;

    protected $fillable = ['name', 'description', 'sku'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
