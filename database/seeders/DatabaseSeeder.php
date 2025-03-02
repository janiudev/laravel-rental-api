<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        (new AttributeSeeder())->run();
        (new RegionSeeder())->run();
        (new RentalPeriodSeeder())->run();
    }
}
