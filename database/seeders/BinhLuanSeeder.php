<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user_ids = DB::table('users')->pluck('id');

        $noiDung = [
            'Bài viết này rất hữu ích, cảm ơn tác giả!',
            'Thông tin trong bài rất chi tiết và rõ ràng.',
            'Mình thấy bài viết này cung cấp nhiều kiến thức bổ ích.',
            'Bài viết này cần thêm một số ví dụ thực tế hơn.',
            'Cảm ơn vì đã chia sẻ thông tin hay này!',
            'Mình rất thích cách trình bày của bài viết.',
            'Bài viết này giúp mình hiểu rõ hơn về chủ đề này.',
            'Một bài viết đáng đọc, rất bổ ích.',
            'Mong rằng sẽ có thêm nhiều bài viết như thế này.',
            'Bài viết được viết rất mạch lạc và dễ hiểu.'
        ];

        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('binh_luans')->insert([
                'user_id' => $faker->randomElement($user_ids),
                'bai_viet_id' => rand(1, 10),
                'noi_dung' => $faker->randomElement($noiDung),
                'ngay_binh_luan' => fake()->date(),
                'trang_thai'=>fake()->randomElement(['an','hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
