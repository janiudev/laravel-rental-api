<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductPricing;
use App\Models\Region;
use App\Models\RentalPeriod;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $rentalPeriods = RentalPeriod::all();
        $regions = Region::all();

        $product = Product::create([
            'name' => 'Macbook PRO',
            'description' => 'Macbook PRO rental item.',
            'sku' => 'MBP-001',
        ]);

        $attributeValueIds = AttributeValue::pluck('id')->toArray();
        $product->attributes()->attach($attributeValueIds);

        foreach ($rentalPeriods as $period) {
            foreach ($regions as $region) {
                $price = $region->code === 1 ? 10 : 100;
                $productPricing = new ProductPricing();
                $productPricing->region()->associate($region);
                $productPricing->rentalPeriod()->associate($period);
                $productPricing->product()->associate($product);
                $productPricing->price = $price;

                $productPricing->save();
            }
        }
    }
}
