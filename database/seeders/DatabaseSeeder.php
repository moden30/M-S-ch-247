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
        $this->call([
            UserSeeder::class,
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
            CommissionSeeder::class
        ]);
    }
}
