<?php

namespace Database\Factories;

use App\Enums\ArticleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_article' => $this->faker->sentence(),
            'content_article' => $this->faker->paragraph(),
            'type_article' => $this->faker->randomElement(ArticleEnum::getArticleType()),
            'content2_article' => $this->faker->paragraph(),
            'section_article' => $this->faker->paragraph(),
        ];
    }
}
