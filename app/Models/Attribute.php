<?php

namespace App\Models;

use App\Relationship\AttributeValue\HasManyAttributeValueTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory, HasManyAttributeValueTrait;

    public $timestamps = false;
    protected $fillable = ['name', 'active'];
}
