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
        $userIds = DB::table('users')->pluck('id')->toArray();
        $sachIds = DB::table('saches')->pluck('id')->toArray();
        if (empty($userIds) || empty($sachIds)) {
            return;
        }

        for ($i = 0; $i < 50; $i++) {
            $userId = $faker->randomElement($userIds); // Chọn ngẫu nhiên user
            // Lấy các sách đã được gán cho user
            $usedSachIds = DB::table('user_saches')->where('user_id', $userId)->pluck('sach_id')->toArray();
            // Các sách mà user chưa đọc
            $availableSachIds = array_diff($sachIds, $usedSachIds);

            // Nếu không còn sách chưa đọc, bỏ qua user này
            if (empty($availableSachIds)) {
                continue;
            }

            $sachId = $faker->randomElement($availableSachIds); // Chọn ngẫu nhiên sách mà user chưa có
            $chuongIds = DB::table('chuongs')->where('sach_id', $sachId)->pluck('id')->toArray();

            if (!empty($chuongIds)) {
                DB::table('user_saches')->insert([
                    'user_id' => $userId,
                    'sach_id' => $sachId,
                    'chuong_id' => $faker->randomElement($chuongIds),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
