<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LichSuDangNhapSeeder extends Seeder
{
    public function run()
    {
        $user_id = DB::table('users')->pluck('id');

        foreach ($user_id as $id) {
            for ($j = 0; $j <= 5; $j++) {
                DB::table('lich_su_dang_nhaps')->insert(
                    [

                        'tai_khoan_id' => $id,
                        'ten_thiet_bi' => 'Laptop Dell ' . fake()->randomNumber(),
                        'dia_chi_ip' => '192.168.1.1',
                        'trinh_duyet' => 'Chrome',
                        'he_dieu_hanh' => 'Windows 10',
                        'login_time' => Carbon::now(),
                        'logout_time' => null, // User chưa logout
                        'is_active' => true,
                        'dia_diem' => 'Việt Nam',
                    ]);
            }
        }
    }
}
