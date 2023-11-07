<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 6; $i++) {
            DB::table('comments')->insert([
                'user_id' => '1',
                'post_id' => $i,
                'message' => $faker->text(),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
