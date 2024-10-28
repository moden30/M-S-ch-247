<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Get all category IDs from the the_loais table
        $the_loai_ids = DB::table('the_loais')->pluck('id')->toArray();

        // Loop through each book (assuming we want to create 10 books)
        for ($sach_id = 1; $sach_id <= 10; $sach_id++) {
            // Insert a book with a random category
            DB::table('saches')->insert([
                'user_id' => rand(1, 10),
                'the_loai_id' => $the_loai_ids[array_rand($the_loai_ids)], // Random category ID
                'ten_sach' => $faker->text(30),
                'tac_gia' => $faker->name,
                'anh_bia_sach' => $faker->imageUrl(),
                'gia_goc' => $faker->numberBetween(10000, 1000000),
                'tom_tat' => $faker->text(200),
                'ngay_dang' => $faker->date(),
                'noi_dung_nguoi_lon' => $faker->randomElement(['co', 'khong']),
                'gia_khuyen_mai' => $faker->numberBetween(10000, 1000000),
                'so_luong_da_ban' => $faker->numberBetween(1, 100),
                'kiem_duyet' => $faker->randomElement(['cho_xac_nhan', 'tu_choi', 'duyet', 'ban_nhap']),
                'trang_thai' => $faker->randomElement(['an', 'hien']),
                'tinh_trang_cap_nhat' => $faker->randomElement(['da_full', 'tiep_tuc_cap_nhat']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
