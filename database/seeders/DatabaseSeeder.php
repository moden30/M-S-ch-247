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



        for ($i = 1; $i <= 20; $i++) {
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
            UserSachesTableSeeder::class
        ]);
    }
}
