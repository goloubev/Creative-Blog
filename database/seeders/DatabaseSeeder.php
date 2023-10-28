<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

// php artisan migrate:fresh --seed
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tagIds = Tag::factory(10)->create();
        $tagIds = $tagIds->pluck('id');

        for ($i = 0; $i < 5; $i++) {
            $posts = Post::factory(3)->create([
                'category_id' => Category::factory()->create()->id,
            ]);

            foreach ($posts as $post) {
                $randomTagIds = $tagIds->random(3);
                $post->tags()->attach($randomTagIds);
            }
        }

        User::factory()->create([
            'name'  => 'Vadim Goloubev',
            'email' => 'goloubev@hotmail.com',
            'role' => User::ROLE_ADMIN,
            'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
            'email_verified_at' => Carbon::now(),
        ]);

        User::factory()->create([
            'name'  => 'Test Reader',
            'email' => 'zzz@zzzz.com',
            'role' => User::ROLE_READER,
            'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
            'email_verified_at' => Carbon::now(),
        ]);

        for ($i = 1; $i <= 3; $i++) {
            User::factory()->create([
                'name'  => 'User '.$i,
                'email' => 'user'.$i.'@test.com',
                'role' => User::ROLE_READER,
                'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
