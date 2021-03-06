<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->realText(),
            'meta_title' => $this->faker->title(),
            'meta_description' => $this->faker->title(),
            'order' => $this->faker->randomNumber(2),
//            'slug' => Str::slug($this->faker->unique()->title(), '-'),
            'slug' => $this->faker->unique()->name(),
        ];
    }
}
