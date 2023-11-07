<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        define('MAX_POSTS_BY_CATEGORY', 3);

        $tags = Tag::all();
        $tagIds = $tags->pluck('id');

        $categories = Category::all();
        $categoryIds = $categories->pluck('id');

        $imageIds = range(1, (count($categoryIds) * MAX_POSTS_BY_CATEGORY));

        foreach ($categoryIds as $categoryId) {
            for ($i = 0; $i < MAX_POSTS_BY_CATEGORY; $i++) {
                $imageId = array_shift($imageIds);

                $post = Post::factory()->create([
                    'category_id' => $categoryId,
                    'preview_image' => 'images/'.$imageId.'_small.jpg',
                    'main_image' => 'images/'.$imageId.'_big.jpg',
                ]);

                // Add tags to each post
                $randomTagIds = $tagIds->random(2);
                $post->tags()->attach($randomTagIds);
            }
        }
    }
}
