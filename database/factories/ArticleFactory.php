<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $this->faker->title,
            'short_description' => $this->faker->realText(),
            'published' => 1,
            'content' => $this->faker->realText(),
            'article_category_id' => $this->faker->numberBetween(1,3),
            'user_id' => User::factory(),// $this->faker->numberBetween(1,3),
            'meta_title' => $this->faker->title(),
            'meta_description' => $this->faker->title(),
            'slug' => Str::slug($this->faker->unique()->name(), '-'),


        ];
    }
}
