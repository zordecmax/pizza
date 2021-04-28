<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'short_description' => $this->faker->realText(),
            'published' => 1,
            'content' => $this->faker->realText(),
            'article_category_id' => rand(0,5),
            'image_id' => rand(0,10),
            'tag_id' => rand(0,10),
            'meta_title' => $this->faker->title(),
            'meta_description' => $this->faker->title(),
            'slug' => $this->faker->unique()->title(),


        ];
    }
}
