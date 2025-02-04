<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_place' => $this->faker->sentence(),
            'address_place' => $this->faker->paragraph(),
            'latitude_place' => $this->faker->latitude(),
            'longitude_place' => $this->faker->longitude(),
            'article_id' => $this->faker->numberBetween(1, count(Article::all()))
        ];
    }
}
