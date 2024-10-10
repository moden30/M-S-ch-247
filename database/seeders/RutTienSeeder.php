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
                'so_tien' => rand(10000, 1000000),
                'trang_thai' => fake()->randomElement(['dang_xu_ly', 'da_duyet', 'da_huy']),
                'anh_qr' => fake()->imageUrl(),
                'ghi_chu' => fake()->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
