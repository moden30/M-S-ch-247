<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KiemDuyetCongTacVienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            for ($j = 0; $j < 5; $j++) {
                DB::table('kiem_duyet_cong_tac_viens')->insert([
                    'user_id' => $user->id,
                    'ten_doc_gia' => $user->name ?? 'Nguyễn Văn A',
                    'so_dien_thoai' => $user->phone ?? $faker->phoneNumber,
                    'dia_chi' => $user->address ?? $faker->address,
                    'sinh_nhat' => $user->sinh_nhat ?? $faker->date(),
                    'gioi_tinh' => $user->gioi_tinh ?? $faker->randomElement(['Nam', 'Nữ']),
                    'cmnd_mat_truoc' => 'path/to/front/cmnd.jpg',
                    'cmnd_mat_sau' => 'path/to/back/cmnd.jpg',
                    'trang_thai' => $faker->randomElement(['duyet', 'tu_choi']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
