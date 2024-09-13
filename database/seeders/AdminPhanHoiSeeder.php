<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPhanHoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('admin_phan_hois')->insert([
                'user_id' => rand(1, 10),
                'lien_he_id' => rand(1, 10),
                'noi_dung_phan_hoi' => fake()->text(200),
            ]);
        }
    }
}
