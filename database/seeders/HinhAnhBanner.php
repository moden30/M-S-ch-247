<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhAnhBanner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner_id = DB::table('banners')->pluck('id');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('hinh_anh_banners')->insert([
                'banner_id' => $banner_id->random(),
                'hinh_anh' => fake()->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
