<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RutTienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rut_tiens')->insert([
                'cong_tac_vien_id' => rand(1, 10),
                'ma_yeu_cau' =>fake()->bothify('??-####'),
                'so_tien' => rand(10000, 1000000),
                'trang_thai' => fake()->randomElement(['dang_xu_ly', 'da_duyet', 'da_huy']),
                'ten_ngan_hang' => fake()->randomElement(['MB Bank', 'Viettin Bank', 'TP Bank', 'VCB', 'BIDV', 'Momo']),
                'so_tai_khoan' => fake()->phoneNumber(),
                'ten_chu_tai_khoan' => fake()->text(20),
                'anh_qr' => fake()->imageUrl(),
                'ghi_chu' => fake()->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
