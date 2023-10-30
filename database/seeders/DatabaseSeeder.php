<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

/*
php artisan migrate:fresh --seed
*/
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = app(Generator::class);
        $imageIds = range(1, 9);

        // Create categories
        $categoryIds = [];
        for ($i = 0; $i < 3; $i++) {
            $categoryIds[] = Category::factory()->create()->id;
        }

        // Create tags
        $tags = Tag::factory(20)->create();
        $tagIds = $tags->pluck('id');

        foreach ($categoryIds as $categoryId) {
            // Create posts
            for ($i = 0; $i < 3; $i++) {
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

        $mainUser = User::factory()->create([
            'name'  => 'Vadim Goloubev',
            'email' => 'goloubev@hotmail.com',
            'role' => User::ROLE_ADMIN,
            'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
            'email_verified_at' => Carbon::now(),
        ]);

        User::factory()->create([
            'name'  => 'Test Reader',
            'email' => 'reader@hotmail.com',
            'role' => User::ROLE_READER,
            'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
            'email_verified_at' => Carbon::now(),
        ]);

        /*for ($i = 1; $i <= 3; $i++) {
            User::factory()->create([
                'name'  => 'User '.$i,
                'email' => 'user'.$i.'@test.com',
                'role' => User::ROLE_READER,
                'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
                'email_verified_at' => Carbon::now(),
            ]);
        }*/

        // Posts likes
        for ($i = 1; $i <= 3; $i++) {
            DB::table('user_post_likes')->insert([
                'user_id' => $mainUser->id,
                'post_id' => $i,
                'created_at' => Carbon::now(),
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            DB::table('user_post_likes')->insert([
                'user_id' => '2',
                'post_id' => $i,
                'created_at' => Carbon::now(),
            ]);
        }

        // Posts comments
        for ($i = 1; $i < 6; $i++) {
            DB::table('comments')->insert([
                'user_id' => $mainUser->id,
                'post_id' => $i,
                'message' => $faker->text(),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
