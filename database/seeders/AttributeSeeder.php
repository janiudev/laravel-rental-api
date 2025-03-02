<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [];
        $attributes[] = Attribute::insertGetId(['name' => 'Color']);
        $attributes[] = Attribute::insertGetId(['name' => 'Size']);

        $attributeValues = [
            ['attribute_id' => $attributes[0], 'value' => 'Black'],
            ['attribute_id' => $attributes[0], 'value' => 'Gray'],
            ['attribute_id' => $attributes[1], 'value' => '14 inch'],
            ['attribute_id' => $attributes[1], 'value' => '16 inch']
        ];
        AttributeValue::insert($attributeValues);
    }
}
