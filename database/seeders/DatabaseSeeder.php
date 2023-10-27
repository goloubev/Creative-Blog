<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

// php artisan migrate:fresh --seed
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Tag::factory(10)->create();

        for ($i = 0; $i < 5; $i++) {
            Post::factory(3)->create([
                'category_id' => Category::factory()->create()->id,
            ]);
        }


        /*User::factory(10)->create();

        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
