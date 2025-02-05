<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media' => 'default_picture'.'.jpeg',
            'type_media' => rand(0, 1) ? 'image' : 'video',
            'article_id' => $this->faker->numberBetween(1, count(Article::all())),
        ];
    }
}
