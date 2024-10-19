<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            'slider',
            'footer'
        ];

        for ($i = 0; $i < count($type); $i++) {
            DB::table('banners')->insert([
                'tieu_de' => fake()->text(50),
                'noi_dung' => fake()->text(100),
                'loai_banner' => fake()->randomElement($type),
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
