<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        Region::insert([
            ['code' => 1, 'currency' => '$', 'name' => 'Singapore'],
            ['code' => 2, 'currency' => 'RM', 'name' => 'Malaysia']
        ]);
    }
}
