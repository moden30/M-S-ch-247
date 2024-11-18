<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Khách hàng',
            'Kiểm duyệt viên',
            'Cộng tác viên'
        ];

        $moTa = [
            'Vai trò admin',
            'Vai trò khách hàng',
            'Vai trò kiểm duyệt viên',
            'Vai trò cộng tác viên',
        ];

        for ($i = 0; $i < count($roles); $i++) {
            DB::table('vai_tros')->insert([
                'ten_vai_tro' => $roles[$i],
                'mo_ta' => $moTa[$i],
                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
