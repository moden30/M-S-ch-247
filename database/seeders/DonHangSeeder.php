<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $pttt = DB::table('phuong_thuc_thanh_toans')->pluck('id')->toArray();
        $user_ids = DB::table('users')->pluck('id');
        $sach_ids = DB::table('saches')->pluck('id');
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 55; $i++) {
            DB::table('don_hangs')->insert([
                'sach_id' => $faker->randomElement($sach_ids),
                'user_id' => $faker->randomElement($user_ids),
                'phuong_thuc_thanh_toan_id' => $pttt[array_rand($pttt)],
                'ma_don_hang' =>fake()->bothify('??-####'),
                'so_tien_thanh_toan' => fake()->numberBetween(10000,1000000),
                'trang_thai'=>fake()->randomElement(['thanh_cong','that_bai']),
                'mo_ta' => fake()->text(200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}






