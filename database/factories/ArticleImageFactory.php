<?php

namespace Database\Factories;

use App\Models\ArticleImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class   ArticleImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
//            'path' => $this->faker->image('public/storage/images'),
            'path' => 'article.jpg',
            'size' => $this->faker->name(),
            'article_id' => $this->faker->numberBetween(11,30),
        ];
    }
}
