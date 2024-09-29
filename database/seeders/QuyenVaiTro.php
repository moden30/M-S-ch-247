<?php

namespace Database\Seeders;

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
        // for($i = 1; $i <= 10; $i ++){
        //     DB::table('quyen_vai_tros')->insert([
        //         'quyen_id'=> rand(1,10),
        //         'vai_tro_id'=>rand(1,10),
        //     ]);
        // }

        $roles = DB::table('vai_tros')->pluck('id');
        $permission = DB::table('quyens')->pluck('id');

        $roles = DB::table('vai_tros')->pluck('id'); // Lấy tất cả vai trò
        $permissions = DB::table('quyens')->pluck('id'); // Lấy tất cả quyền

        foreach ($permissions as $quyenId) { // Duyệt qua từng quyền
            foreach ($roles as $vaiTroId) { // Duyệt qua từng vai trò

                // Kiểm tra xem quyền này đã được gán cho vai trò này chưa
                $exists = DB::table('quyen_vai_tros')
                    ->where('quyen_id', $quyenId)
                    ->where('vai_tro_id', $vaiTroId)
                    ->exists();

                if (!$exists) {
                    // Nếu chưa tồn tại thì thêm vào bảng trung gian
                    DB::table('quyen_vai_tros')->insert([
                        'quyen_id' => $quyenId,
                        'vai_tro_id' => $vaiTroId,
                    ]);
                }
            }
        }
    }
}
