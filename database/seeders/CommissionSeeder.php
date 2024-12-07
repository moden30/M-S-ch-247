<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Commission;
use App\Models\VaiTro;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo instance của Faker
        $faker = Faker::create();

        // Lấy tất cả người dùng
        $users = User::all();

        foreach ($users as $user) {
            if ($user->hasRole(VaiTro::ADMIN_ROLE_ID)) {
                Commission::create([
                    'user_id' => $user->id,
                    'rate' => 100,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else if ($user->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                Commission::create([
                    'user_id' => $user->id,
                    'rate' => 60,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

