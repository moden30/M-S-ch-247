<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            'Quản lý thể loại sách',
            'Quản lý sách',
            'Quản lý thành viên',
            'Quản lý vai trò',
            'Quản lý bài viết',
            'Quản lý liên hệ',
            'Quản lý đơn hàng,',
            'Quản lý bình luận',
            'Quản lý đánh giá',
            'Quản lý banner',
        ];
        for ($i = 0; $i < count($permission); $i++) {
            DB::table('quyens')->insert([
                'ten_quyen' => $permission[$i],
                'mo_ta' => fake()->text(100),
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
