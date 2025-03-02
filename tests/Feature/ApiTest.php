<?php

namespace Tests\Feature;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Region;
use App\Models\RentalPeriod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/products');

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'description', 'sku']
            ]
        ]);
    }

    /** @test */
    public function it_can_create_products()
    {
        $region = Region::factory()->create();
        $rentalPeriod = RentalPeriod::factory()->create();
        $attributeValue = AttributeValue::factory()->create();

        // Define product payload
        $payload = [
            'name' => 'Test Product',
            'sku' => 'TEST123',
            'description' => 'Test Description',
            'attributes' => [$attributeValue->id],
            'pricing' => [
                [
                    'region_id' => $region->id,
                    'rental_period_id' => $rentalPeriod->id,
                    'price' => 100.50
                ]
            ]
        ];

        // Send API request
        $response = $this->postJson('/api/v1/products', $payload);

        // Assert response
        $response->assertStatus(201) // Check if product is created
        ->assertJsonStructure([
            'data' => [
                'id', 'name', 'sku', 'description'
            ]
        ]);

        // Verify product is stored in database
        $this->assertDatabaseHas('products', ['sku' => 'TEST123']);
    }
}
