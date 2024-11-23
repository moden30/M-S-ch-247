<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LuuThongTinTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = DB::table('users')->pluck('id');
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('luu_thong_tin_tai_khoan')->insert([
                'user_id' => $faker->randomElement($user_ids->toArray()),
                'ten_ngan_hang' => $faker->randomElement(['MB Bank', 'Viettin Bank', 'TP Bank', 'VCB', 'BIDV', 'Momo']),
                'so_tai_khoan' => $faker->bankAccountNumber(),
                'ten_chu_tai_khoan' => $faker->name(),
                'anh_qr' => $faker->imageUrl(200, 200, 'business', true, 'QR'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
