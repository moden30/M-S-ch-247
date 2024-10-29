<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseImagePath = 'uploads/bai-viet/';
        $fileName = [
            'bai_viet_1.jpg',
            'bai_viet_2.png',
            'bai_viet_3.png',
            'bai_viet_4.png',
            'bai_viet_5.jpg',
            'bai_viet_6.jpg',
            'bai_viet_7.jpg',
            'bai_viet_8.jpg',
            'bai_viet_9.jpg',
            'bai_viet_10.png',
            'bai_viet_11.png',
            'bai_viet_12.png',
            'bai_viet_13.jpg',
            'bai_viet_14.png',
            'bai_viet_15.jpg',
            'bai_viet_16.png',
            'bai_viet_17.jpg',
            'bai_viet_18.jpg',
            'bai_viet_19.jpg',
            'bai_viet_20.jpg',

        ];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('bai_viets')->insert([
                'user_id' => rand(1, 10),
                'chuyen_muc_id' => rand(1, 10),
                'hinh_anh' => $baseImagePath . $fileName[$i - 1],
                'tieu_de' => fake()->text(50),
                'noi_dung' => fake()->text(200),
                'ngay_dang' => fake()->date(),
                'trang_thai'=>fake()->randomElement(['an','hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
