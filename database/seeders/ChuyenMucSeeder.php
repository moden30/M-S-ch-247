<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // chuyên mục gốc (không có cha) để có sẵn dữ liệu cho việc gán làm cha cho các chuyên mục khác
        for ($i = 1; $i <= 5; $i++) {
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => fake()->text(20),
                'chuyen_muc_cha_id' => null, // Các chuyên mục gốc không có cha
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // lấy tất cả các ID của các chuyên mục đã tạo (chuyên mục gốc)
        // để có thể sử dụng chúng làm chuyen_muc_cha_id cho các chuyên mục con
        $parentIds = DB::table('chuyen_mucs')->pluck('id');

        // tạo các chuyên mục con và gán cho chúng một chuyen_muc_cha_id ngẫu nhiên từ danh sách các ID của các chuyên mục gốc.
        for ($i = 1; $i <= 5; $i++) {
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => fake()->text(20),
                'chuyen_muc_cha_id' => $parentIds->random(), // Chọn ngẫu nhiên một chuyên mục cha đã tồn tại
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
