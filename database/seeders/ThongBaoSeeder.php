<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = DB::table('users')->pluck('id')->toArray();
        $faker = \Faker\Factory::create();
        $thongBao = [
            [
                'tieu_de' => 'Cập nhật sách mới',
                'noi_dung' => 'Chương mới của sách "Lập Trình PHP" đã được cập nhật',
            ],
            [
                'tieu_de' => 'Khuyến mãi sách tháng này',
                'noi_dung' => 'Giảm giá 20% cho tất cả sách trong tháng này',
            ],
            [
                'tieu_de' => 'Chia sẻ sách công nghệ',
                'noi_dung' => 'Mời bạn tham gia buổi chia sẻ về sách "Công Nghệ Mới"',
            ],
            [
                'tieu_de' => 'Chính sách đổi trả',
                'noi_dung' => 'Thông báo về chính sách đổi trả sách',
            ],
            [
                'tieu_de' => 'Phiên bản sách mới',
                'noi_dung' => 'Sách yêu thích của bạn đã có phiên bản mới',
            ],
            [
                'tieu_de' => 'Sách bán chạy tháng này',
                'noi_dung' => 'Cập nhật danh sách sách bán chạy trong tháng này',
            ],
            [
                'tieu_de' => 'Ứng dụng xem sách mới',
                'noi_dung' => 'Thêm tính năng mới: Xem sách trên ứng dụng di động',
            ],
            [
                'tieu_de' => 'Giao lưu với tác giả',
                'noi_dung' => 'Thông báo về sự kiện giao lưu với tác giả sách XYZ',
            ],
            [
                'tieu_de' => 'Mã giảm giá đầu tiên',
                'noi_dung' => 'Tặng mã giảm giá cho khách hàng mua sách đầu tiên',
            ],
            [
                'tieu_de' => 'Sách miễn phí',
                'noi_dung' => 'Sách "Học Lập Trình JavaScript" hiện đang miễn phí',
            ],
        ];
        for ($i = 0; $i < 50; $i++) {
            $randomThongBao = $faker->randomElement($thongBao);
            DB::table('thong_baos')->insert([
                'tieu_de' => $randomThongBao['tieu_de'],
                'noi_dung' => $randomThongBao['noi_dung'],
                'trang_thai' => fake()->randomElement(['da_xem', 'chua_xem']),
                'user_id' => $faker->randomElement($user_ids),
                'url' => fake()->url(),
                'type' => fake()->randomElement(['sach', 'tien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
