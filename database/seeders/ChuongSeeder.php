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

        // Loop through each book (assuming there are 10 books)
        for ($sach_id = 1; $sach_id <= 10; $sach_id++) {
            // Create at least 10 chapters for each book
            $soChuong = rand(10, 15); // Randomize the number of chapters (between 10 and 15)

            for ($chuong = 1; $chuong <= $soChuong; $chuong++) {
                DB::table('chuongs')->insert([
                    'sach_id' => $sach_id, // Assign the current book id
                    'tieu_de' => $faker->text(40),
                    'noi_dung' => implode("\n\n", $faker->paragraphs(40)),
                    'so_chuong' => $chuong, // Set chapter number incrementally starting from 1
                    'ngay_len_song' => $faker->date(),
                    'trang_thai' => $faker->randomElement(['an', 'hien']),
                    'kiem_duyet' => $faker->randomElement(['cho_xac_nhan', 'tu_choi', 'duyet', 'ban_nhap']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
