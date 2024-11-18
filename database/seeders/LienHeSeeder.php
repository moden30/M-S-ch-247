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
        $users = DB::table('users')->take(10)->get(['id', 'ten_doc_gia', 'email']);

        $noiDung = [
            [
                'tieu_de' => 'Lỗi khi truy cập trang web',
                'noi_dung' => 'Mình gặp vấn đề khi truy cập vào trang web, không thể tải sách được.'
            ],
            [
                'tieu_de' => 'Lỗi thanh toán',
                'noi_dung' => 'Có một số lỗi khi thanh toán, mong được hỗ trợ giải quyết.'
            ],
            [
                'tieu_de' => 'Không tìm thấy sách sau khi mua',
                'noi_dung' => 'Mình không thể tìm thấy sách sau khi mua, mong được hướng dẫn.'
            ],
            [
                'tieu_de' => 'Lỗi tải sách xuống',
                'noi_dung' => 'Sách không thể tải xuống mặc dù đã thanh toán thành công, cần hỗ trợ.'
            ],
            [
                'tieu_de' => 'Không nhận được mã xác nhận',
                'noi_dung' => 'Mình không nhận được mã xác nhận khi đăng ký tài khoản, xin vui lòng kiểm tra.'
            ],
            [
                'tieu_de' => 'Lỗi chức năng đánh giá sách',
                'noi_dung' => 'Chức năng đánh giá sách không hoạt động, mong được hỗ trợ sửa lỗi.'
            ],
            [
                'tieu_de' => 'Lỗi hiển thị hình ảnh sách',
                'noi_dung' => 'Lỗi hiển thị hình ảnh sách, không thể thấy bìa sách rõ ràng.'
            ],
            [
                'tieu_de' => 'Không lưu được vị trí đọc',
                'noi_dung' => 'Khi cố gắng lưu vị trí đọc, hệ thống không phản hồi.'
            ],
            [
                'tieu_de' => 'Yêu cầu hướng dẫn thay đổi giao diện',
                'noi_dung' => 'Mong được hướng dẫn về cách thay đổi màu giao diện của website.'
            ],
            [
                'tieu_de' => 'Lỗi với tính năng highlight',
                'noi_dung' => 'Mình gặp vấn đề với tính năng highlight, không thể lưu được đoạn văn đã chọn.'
            ]
        ];

        foreach ($users as $user) {
            $feedback = $faker->randomElement($noiDung);
            DB::table('lien_hes')->insert([
                'user_id' => $user->id,
                'ten_khach_hang' => $user->ten_doc_gia,
                'email' => $user->email,
                'chu_de' => $feedback['tieu_de'],
                'noi_dung' => $feedback['noi_dung'],
                'anh' => $faker->imageUrl(640, 480, 'business', true),
                'trang_thai' => $faker->randomElement(['mo', 'dong', 'dang_ho_tro']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
