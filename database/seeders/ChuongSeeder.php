<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Faker\Factory as Faker;

class ChuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('chuongs')->insert([
                'sach_id' => rand(1, 10),
                'tieu_de' => fake()->text(40),
                'noi_dung' => implode("\n\n", $faker->paragraphs(40)),
                'so_chuong' => fake()->numberBetween(1, 100),
                'ngay_len_song' => fake()->date(),
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'kiem_duyet'=>fake()->randomElement(['cho_xac_nhan','tu_choi','duyet','ban_nhap']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
