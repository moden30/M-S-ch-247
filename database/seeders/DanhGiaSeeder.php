<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = DB::table('users')->pluck('id');
        $faker = \Faker\Factory::create();

        $noiDungDanhGia = [
            'Sách này rất hay, nội dung phong phú và hấp dẫn.',
            'Một cuốn sách đáng đọc, mình học được rất nhiều từ nó.',
            'Mình thấy nội dung sách khá tốt nhưng còn một vài điểm cần cải thiện.',
            'Sách có nội dung mạch lạc, dễ hiểu và cuốn hút.',
            'Cuốn sách không đạt kỳ vọng của mình, nội dung chưa sâu sắc.',
            'Đây là một cuốn sách tuyệt vời, mình sẽ giới thiệu cho bạn bè.',
            'Nội dung sách khá bổ ích và thiết thực cho công việc của mình.',
            'Sách được trình bày đẹp và dễ đọc, nội dung chi tiết.',
            'Mình không thấy cuốn sách này phù hợp với nhu cầu của mình.',
            'Sách hay, cung cấp nhiều kiến thức mới lạ.'
        ];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('danh_gias')->insert([
                'sach_id' => rand(1,10),
                'user_id' => $faker->randomElement($user_ids),
                'noi_dung' => fake()->randomElement($noiDungDanhGia),
                'ngay_danh_gia' => fake()->date(),
                'muc_do_hai_long' => fake()->randomElement(['rat_hay','hay','trung_binh','te','rat_te']),
                'trang_thai'=>fake()->randomElement(['an','hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
