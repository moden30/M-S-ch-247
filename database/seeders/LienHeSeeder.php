<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LienHeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $user_ids = DB::table('users')->pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('lien_hes')->insert([
                'user_id' => $faker->randomElement($user_ids),
                'ten_khach_hang' => fake()->text(30),
                'email' => fake()->email(),
                'chu_de' => fake()->text(50),
                'noi_dung' => fake()->text(200),
                'anh' => fake()->imageUrl(20),
                'trang_thai' => fake()->randomElement(['mo', 'dong','dang_ho_tro']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
