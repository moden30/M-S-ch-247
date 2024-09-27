<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Giả sử bạn có 10 tài khoản và 10 vai trò
        $users = DB::table('users')->pluck('id'); // Lấy danh sách ID của users
        $roles = DB::table('vai_tros')->pluck('id'); // Lấy danh sách ID của các vai trò (vai_tro_id)

        foreach ($users as $userId) {
            // Lấy một vai trò ngẫu nhiên
            $vaiTroId = $roles->random();

            // Kiểm tra xem tài khoản này đã có vai trò cụ thể chưa
            $exists = DB::table('vai_tro_tai_khoans')
                ->where('user_id', $userId)
                ->where('vai_tro_id', $vaiTroId)
                ->exists();

            // Nếu tài khoản chưa có vai trò cụ thể, thì gán vai trò cho tài khoản đó
            if (!$exists) {
                DB::table('vai_tro_tai_khoans')->insert([
                    'user_id' => $userId,
                    'vai_tro_id' => $vaiTroId,
                ]);
            }
        }
    }
}
