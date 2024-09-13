<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i ++){
            DB::table('khuyen_mais')->insert([
                'ma_khuyen_mai'=>fake()->bothify('CODE-####??'),
                'ten_khuyen_mai'=>fake()->text(30),
                'phan_tram_giam_gia'=>fake()->numberBetween(10,50),
                'ngay_bat_dau'=>fake()->date(),
                'ngay_bat_ket_thuc'=>now(),
            ]);
        }
    }
}
