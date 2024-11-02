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
        // Tạo 5 chuyên mục gốc (không có cha)
        for ($i = 1; $i <= 5; $i++) {
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => fake()->words(3, true), // Tạo tên chuyên mục thực tế hơn
                'chuyen_muc_cha_id' => null, // Các chuyên mục gốc không có cha
                'trang_thai' => 'hien',
//                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Lấy tất cả các ID của các chuyên mục đã tạo (chuyên mục gốc)
        $parentIds = DB::table('chuyen_mucs')->pluck('id');

        // Tạo chuyên mục con cho các chuyên mục gốc
        for ($i = 1; $i <= 5; $i++) {
            $chuyenMucChaId = $parentIds->random(); // Chọn ngẫu nhiên chuyên mục cha

            // Tạo chuyên mục con cấp 1
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => fake()->words(3, true),
                'chuyen_muc_cha_id' => $chuyenMucChaId, // Gán chuyên mục cha ngẫu nhiên
                'trang_thai' => 'hien',
//                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Lấy ID của chuyên mục con vừa tạo
            $lastInsertedId = DB::getPdo()->lastInsertId();

            // Tạo thêm chuyên mục con cấp 2 và cấp 3 cho chuyên mục con vừa tạo
            for ($j = 1; $j <= 2; $j++) {
                DB::table('chuyen_mucs')->insert([
                    'ten_chuyen_muc' => fake()->words(3, true),
                    'chuyen_muc_cha_id' => $lastInsertedId, // Gán chuyên mục cha là chuyên mục con cấp 1
                    'trang_thai' => 'hien',
//                    'trang_thai' => fake()->randomElement(['an', 'hien']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
