<?php

namespace Database\Seeders;

use App\Models\VaiTro;
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
        $users = DB::table('users')->pluck('id');

        $specificUserRoles = [
            1 => 1,
            2 => 4,
            3 => 3,
            4 => 2,
            5 => 4,
            6 => 4,
            7 => 4,
            8 => 4,
            9 => 4,
            10 => 4,
            11 => 4,
        ];

        foreach ($specificUserRoles as $userId => $roleId) {
            DB::table('vai_tro_tai_khoans')->insert([
                'user_id' => $userId,
                'vai_tro_id' => $roleId
            ]);
        }

        $remainingUsers = $users->diff(array_keys($specificUserRoles));

        foreach ($remainingUsers as $user) {
            DB::table('vai_tro_tai_khoans')->insert([
                'user_id' => $user,
                'vai_tro_id' => VaiTro::CUSTOMER_ROLE_ID
            ]);
        }

    }
}
