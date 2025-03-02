<?php

namespace App\Models;

use App\Relationship\Attribute\BelongsToAttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory,
        BelongsToAttributeTrait;

    public $timestamps = false;
    protected $fillable = ['attribute_id', 'value'];
}
