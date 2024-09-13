<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuyenMaiSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 10; $i++) {
            $sachId = rand(1, 10);
            $khuyenMaiId = rand(1, 10);


            $exists = DB::table('khuyen_mai_saches')
                ->where('sach_id', $sachId)
                ->where('khuyen_mai_id', $khuyenMaiId)
                ->exists();

            if (!$exists) {
                DB::table('khuyen_mai_saches')->insertOrIgnore([
                    'sach_id' => $sachId,
                    'khuyen_mai_id' => $khuyenMaiId,
                    'gia_sau_khuyen_mai' => fake()->numberBetween(10000, 1000000),
                ]);
            }
        }
    }
}
