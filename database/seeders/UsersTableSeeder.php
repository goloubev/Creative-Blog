<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Vadim Goloubev',
            'email' => 'goloubev@hotmail.com',
            'role' => User::ROLE_ADMIN,
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::factory()->create([
            'name'  => 'Test Reader',
            'email' => 'reader@hotmail.com',
            'role' => User::ROLE_ADMIN,
            'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
            'email_verified_at' => Carbon::now(),
        ]);

        for ($i = 1; $i <= 3; $i++) {
            User::factory()->create([
                'name'  => 'User '.$i,
                'email' => 'user'.$i.'@test.com',
                'role' => User::ROLE_ADMIN,
                'password' => '$2y$10$ew5Ou6V57PE0rFne4k46H.XsKaqdI3ewGuxSZEt5GRkzL/vJ06XQm',
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
