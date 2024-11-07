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
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 1,
            6 => 1
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
