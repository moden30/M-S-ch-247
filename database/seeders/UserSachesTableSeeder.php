<?php

namespace Database\Seeders;

use App\Models\Chuong;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = DB::table('users')->pluck('id')->toArray(); // Lấy tất cả ID người dùng
        $sachIds = DB::table('saches')->pluck('id')->toArray(); // Lấy tất cả ID sách
        if (empty($userIds) || empty($sachIds)) {
            return;
        }

        for ($i = 0; $i < 30; $i++) {
            $sachId = $faker->randomElement($sachIds);
            $chuongIds = DB::table('chuongs')->where('sach_id', $sachId)->pluck('id')->toArray();
            DB::table('user_saches')->insert([
                'user_id' => $faker->randomElement($userIds),
                'sach_id' => $sachId,
                'chuong_id' => $faker->randomElement($chuongIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
