<?php

namespace Database\Seeders;

use App\Models\VaiTro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuyenVaiTro extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'id_vai_tros' => VaiTro::CONTRIBUTOR_ROLE_ID, // Cộng tác viên
                'id_quyens' => [
                    13, 14, 15, 16, 18, // sách
                    25, 26, 27, 28, // chương
                    55
                ]
            ],
            [
                'id_vai_tros' => VaiTro::CENSOR_ROLE_ID, // Kiểm duyệt viên
                'id_quyens' => [
                    19, // kiểm duyệt
                    13, // xem danh sách sách
                    18, // cập nhật trạng thái sách
                    17 // ẩn hiện sách
                ]
            ],
            [
                'id_vai_tros' => VaiTro::CUSTOMER_ROLE_ID, // Khách hàng
                'id_quyens' => [

                ]
            ],
            [
                'id_vai_tros' => VaiTro::ADMIN_ROLE_ID, // Admin
                'id_quyens' => range(1, 56) // Admin có tất cả các quyền
            ]
        ];

        foreach ($arr as $item) {
            foreach ($item['id_quyens'] as $id) {
                DB::table('quyen_vai_tros')->insert([
                    'vai_tro_id' => $item['id_vai_tros'],
                    'quyen_id' => $id
                ]);
            }
        }



//        $roles = DB::table('vai_tros')->pluck('id');
//        $permission = DB::table('quyens')->pluck('id');
//
//        $roles = DB::table('vai_tros')->pluck('id'); // Lấy tất cả vai trò
//        $permissions = DB::table('quyens')->pluck('id'); // Lấy tất cả quyền
//
//        foreach ($permissions as $quyenId) { // Duyệt qua từng quyền
//            foreach ($roles as $vaiTroId) { // Duyệt qua từng vai trò
//
//                // Kiểm tra xem quyền này đã được gán cho vai trò này chưa
//                $exists = DB::table('quyen_vai_tros')
//                    ->where('quyen_id', $quyenId)
//                    ->where('vai_tro_id', $vaiTroId)
//                    ->exists();
//
//                if (!$exists) {
//                    // Nếu chưa tồn tại thì thêm vào bảng trung gian
//                    DB::table('quyen_vai_tros')->insert([
//                        'quyen_id' => $quyenId,
//                        'vai_tro_id' => $vaiTroId,
//                    ]);
//                }
//            }
//        }
    }
}
