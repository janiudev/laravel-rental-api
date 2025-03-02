<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RentalPeriodFactory extends Factory
{
    public function definition(): array
    {
        $units = ['day', 'week', 'month', 'year'];

        return [
            'duration' => $this->faker->numberBetween(1, 30),
            'unit' => $this->faker->randomElement($units),
        ];
    }
}
