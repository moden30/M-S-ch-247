<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhuongThucThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pttt = [
            'Momo',
            'Vnpay'
        ];
        for ($i = 0; $i < count($pttt); $i++) {
            DB::table('phuong_thuc_thanh_toans')->insert([
                'ten_phuong_thuc' => $pttt[$i],
                'mo_ta' => fake()->text(100),
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
