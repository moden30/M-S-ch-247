<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('danh_gias')->insert([
                'sach_id' => rand(1,10),
                'user_id' => rand(1,10),
                'noi_dung' => fake()->text(150),
                'ngay_danh_gia' => fake()->date(),
                'muc_do_hai_long' => fake()->randomElement(['Rất hay','Hay','Trung bình','Tệ','Rất tệ']),
            ]);
        }
    }
}
