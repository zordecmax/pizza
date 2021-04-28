<?php

namespace Database\Seeders;

use Faker\Provider\Text;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->insert([
            'name' => Str::random(10),
            'description' => Text::random(300),
            'meta_title' => Str::random(10),
            'meta_description' => Str::random(10),
            'image_id' => rand(0,10),


        ]);

    }
}
