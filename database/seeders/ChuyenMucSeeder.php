<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tieu_de_viet = [
            'Những Cuốn Sách Thay Đổi Cuộc Đời',
            'Giới Thiệu Sách Mới Đáng Đọc',
            'Vai trò của khoa học và công nghệ trong y tế',
            'Những kỹ năng cần thiết để thành công trong thế kỷ 21',
            'Review Sách Kinh Tế - Tài Chính Nổi Bật',
            'Tác Phẩm Văn Học Việt Nam Nổi Bật',
            'Sách về nghệ thuật và văn hóa',
            'Sách cho trẻ em và thanh thiếu niên',
            'Sách về du lịch và khám phá thế giới',
            'Sách về kinh doanh và tài chính cá nhân',
            'Sách về thần thoại và huyền bí'
        ];

        foreach ($tieu_de_viet as $tenChuyenMuc) {
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => $tenChuyenMuc,
                'chuyen_muc_cha_id' => null,
                'trang_thai' => 'hien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Lấy tất cả các ID của các chuyên mục đã tạo (chuyên mục gốc)
        $parentIds = DB::table('chuyen_mucs')->pluck('id');

        $tieu_de_viet_con = [
            'Giới thiệu tác giả nổi tiếng',
            'Sách khoa học đời sống',
            'Sách về quản lý thời gian',
            'Kiến thức về tài chính cá nhân',
            'Cẩm nang khám phá thế giới',
            'Truyện thiếu nhi chọn lọc',
            'Văn hóa và con người',
            'Bí quyết thành công trong sự nghiệp',
            'Kỹ năng mềm trong công việc',
            'Thần thoại Hy Lạp'
        ];

        // Tạo chuyên mục con cho các chuyên mục gốc
        for ($i = 1; $i <= 5; $i++) {
            $chuyenMucChaId = $parentIds->random();

            // Tạo chuyên mục con cấp 1
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => $tieu_de_viet_con[array_rand($tieu_de_viet_con)], // Chọn ngẫu nhiên tên từ mảng
                'chuyen_muc_cha_id' => $chuyenMucChaId,
                'trang_thai' => 'hien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Lấy ID của chuyên mục con vừa tạo
            $lastInsertedId = DB::getPdo()->lastInsertId();

            // Tạo thêm chuyên mục con cấp 2 và cấp 3 cho chuyên mục con vừa tạo
            for ($j = 1; $j <= 2; $j++) {
                DB::table('chuyen_mucs')->insert([
                    'ten_chuyen_muc' => $tieu_de_viet_con[array_rand($tieu_de_viet_con)], // Chọn ngẫu nhiên tên từ mảng
                    'chuyen_muc_cha_id' => $lastInsertedId,
                    'trang_thai' => 'hien',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
