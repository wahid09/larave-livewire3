<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'slug' => Str::slug($this->faker->unique()->name),
            'parent_id' => 0,
            'sort_order' => $this->faker->unique()->numberBetween(1, 100000000),
            'url' => $this->faker->url,
            'icon' => 'fa fa-fa'
        ];
    }
}