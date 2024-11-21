<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminPhanHoi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $baseImagePath = 'uploads/avatar-user/';
        $avatars = [
            'avatar_1.jpg',
            'avatar_2.jpg',
            'avatar_3.jpg',
            'avatar_4.jpg',
            'avatar_5.jpg',
            'avatar_6.jpg',
            'avatar_7.jpg',
            'avatar_8.jpg',
            'avatar_9.jpg',
            'avatar_10.jpg',
            'avatar_11.jpg',
            'avatar_12.jpg',
            'avatar_13.jpg',
            'avatar_14.jpg',
            'avatar_15.jpg',
            'avatar_16.jpg',
            'avatar_17.jpg',
            'avatar_18.jpg',
            'avatar_19.jpg',
            'avatar_20.jpg',
        ];

        $users = [
            [
                'ten_doc_gia' => 'Đỗ Nguyên Giáp',
                'but_danh' => 'Barcarolle',
                'email' => 'donguyengiapicloud@gmail.com',
                'password' => bcrypt('admin'),
                'trang_thai' => 'hoat_dong',
                'so_dien_thoai' => '0901234567',
                'hinh_anh' => $baseImagePath . $faker->randomElement($avatars),
                'dia_chi' => '190 Đường Sông Lương, Hòa Hạ, Bạch Hạ, Phú Xuyên, Hà Nội',
                'sinh_nhat' => '2004-01-15',
                'gioi_tinh' => 'Nam',
            ],
            [
                'ten_doc_gia' => 'Nguyễn Quang Sơn',
                'but_danh' => 'Sơn đẹp troai',
                'email' => 'nquangson04@gmail.com',
                'password' => bcrypt('admin'),
                'trang_thai' => 'hoat_dong',
                'so_dien_thoai' => '0902345678',
                'hinh_anh' => $baseImagePath . $faker->randomElement($avatars),
                'dia_chi' => '456 Đường DEF, Hồ Chí Minh',
                'sinh_nhat' => '1992-02-02',
                'gioi_tinh' => 'Nữ',
            ],
            [
                'ten_doc_gia' => 'Nguyễn Thị Lan',
                'but_danh' => 'Lan hay cọc',
                'email' => 'lann47897@gmail.com',
                'password' => bcrypt('admin'),
                'trang_thai' => 'hoat_dong',
                'so_dien_thoai' => '0903456789',
                'hinh_anh' => $baseImagePath . $faker->randomElement($avatars),
                'dia_chi' => '789 Đường GHI, Đà Nẵng',
                'sinh_nhat' => '2004-03-03',
                'gioi_tinh' => 'Nữ',
            ],
            [
                'ten_doc_gia' => 'Nguyễn Mạnh Tuấn',
                'but_danh' => 'Tuấn 50%',
                'email' => 'tuannm4204@gmail.com',
                'password' => bcrypt('admin'),
                'trang_thai' => 'hoat_dong',
                'so_dien_thoai' => '0904567890',
                'hinh_anh' => $baseImagePath . $faker->randomElement($avatars),
                'dia_chi' => '123 Đường JKL, Hải Phòng',
                'sinh_nhat' => '2004-04-04',
                'gioi_tinh' => 'Nam',
            ],
            [
                'ten_doc_gia' => 'Hoàng Phúc Quân',
                'but_danh' => 'Hoàng Phúc Quân',
                'email' => 'quan180604@gmail.com',
                'password' => bcrypt('admin'),
                'trang_thai' => 'hoat_dong',
                'so_dien_thoai' => '0904567890',
                'hinh_anh' => $baseImagePath . $faker->randomElement($avatars),
                'dia_chi' => '123 Đường JKL, Hải Phòng',
                'sinh_nhat' => '2004-04-04',
                'gioi_tinh' => 'Nam',
            ],
            [
            'ten_doc_gia' => 'Nguyễn Thị Phương',
            'but_danh' => 'Nguyễn Thị Phương',
            'email' => 'phamthid@example.com',
            'password' => bcrypt('admin'),
            'trang_thai' => 'hoat_dong',
            'so_dien_thoai' => '0904567890',
            'hinh_anh' => $baseImagePath . $faker->randomElement($avatars),
            'dia_chi' => '123 Đường JKL, Hải Phòng',
            'sinh_nhat' => '1994-04-04',
            'gioi_tinh' => 'Nữ',
        ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert(array_merge($user, [
                'created_at' => now()
            ]));
        }

        for ($i = 1; $i <= 14; $i++) {
            DB::table('users')->insert([
                'ten_doc_gia' => $faker->name(),
                'but_danh' => $faker->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('admin'),
                'trang_thai' => fake()->randomElement(['hoat_dong', 'khoa']),
                'so_dien_thoai' => $faker->phoneNumber(),
                'hinh_anh' =>  $baseImagePath . $avatars[$i - 1],
                'dia_chi' => $faker->address(),
                'sinh_nhat' => fake()->date(),
                'gioi_tinh' => fake()->randomElement(['Nam', 'Nữ']),
                'created_at' => now()
            ]);
        }

        $this->call([

            BannerSeeder::class,
            QuyenSeeder::class,
            VaiTroSeeder::class,
            QuyenVaiTro::class,
            VaiTroTaiKhoanSeeder::class,
            ChuyenMucSeeder::class,
            BaiVietSeeder::class,
            BinhLuanSeeder::class,
            LienHeSeeder::class,
            TheLoaiSeeder::class,
            SachSeeder::class,
            YeuThichSeeder::class,
            DanhGiaSeeder::class,
            ChuongSeeder::class,
            PhuongThucThanhToanSeeder::class,
            PhanHoiKiemDuyetVienSeeder::class,
            ThongBaoSeeder::class,
            DonHangSeeder::class,
            HinhAnhBanner::class,
            RutTienSeeder::class,
            LichSuDangNhapSeeder::class,
            KiemDuyetCongTacVienSeeder::class,
        ]);
    }
}
