<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('user_post_likes')->insert([
                'user_id' => '1',
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
    }
}
