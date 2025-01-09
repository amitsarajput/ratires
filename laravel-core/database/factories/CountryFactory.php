<?php

namespace Database\Factories;

use App\Models\Region;
use Database\Factories\RegionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'region_id'=> Region::factory()->create(),
            'name' => fake()->name(),
            'code' => fake()->name(),
            'slug' => fake()->slug()
        ];
    }
}
