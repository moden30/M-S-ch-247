<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            'slider',
            'footer'
        ];

        $records = [
            [
                'tieu_de' => 'Khuyến mãi hấp dẫn mùa hè',
                'noi_dung' => 'Tham gia ngay để nhận ưu đãi lớn nhất trong năm.',
            ],
            [
                'tieu_de' => 'Sự kiện giảm giá tháng 11',
                'noi_dung' => 'Cơ hội vàng mua sắm với giá ưu đãi bất ngờ.',
            ]
        ];

        for ($i = 0; $i < count($type); $i++) {
            DB::table('banners')->insert([
                'tieu_de' => $records[$i]['tieu_de'],
                'noi_dung' => $records[$i]['noi_dung'],
                'loai_banner' => $type[$i],
                'trang_thai' => 'hien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
