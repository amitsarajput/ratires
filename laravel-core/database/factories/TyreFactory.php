<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\SearchTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tyre>
 */
class TyreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'search_tag_id'=>SearchTag::factory()->create(),
            'brand_id'=>Brand::factory()->create(),            
            'name' => fake()->name(),
            'preview_name' => fake()->name(),
            'slug' => fake()->slug()
        ];
    }
}
