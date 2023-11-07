<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->words(5, true)),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'category_id' => Category::factory(),
            'preview_image' => '',
            'main_image' => '',
        ];
    }
}
