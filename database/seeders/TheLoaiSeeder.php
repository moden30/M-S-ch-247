<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $the_loai_mau = [
            'Tiểu thuyết',
            'Khoa học viễn tưởng',
            'Giả tưởng',
            'Huyền bí',
            'Tâm lý',
            'Lịch sử',
            'Phiêu lưu',
            'Kinh dị',
            'Lãng mạn',
            'Kỹ năng sống'
        ];
        $mo_ta_mau = [
            "Cuốn tiểu thuyết này kể về cuộc sống của một gia đình trong những thập kỷ biến động, khám phá mối quan hệ phức tạp giữa các thế hệ.",
            "Một câu chuyện khoa học viễn tưởng kỳ thú về một thế giới tương lai nơi mà công nghệ đã thay đổi hoàn toàn cách con người sống và giao tiếp.",
            "Hành trình khám phá một vương quốc giả tưởng đầy phép thuật, nơi mà những sinh vật kỳ diệu tồn tại và những cuộc chiến giữa thiện và ác diễn ra.",
            "Một câu chuyện huyền bí đầy kịch tính về một vụ án mạng không thể lý giải, dẫn dắt người đọc vào những bí ẩn của tâm trí con người.",
            "Khám phá sâu sắc tâm lý của nhân vật chính khi họ phải đối mặt với những ám ảnh từ quá khứ và tìm kiếm sự tha thứ.",
            "Cuốn sách này đưa người đọc trở về quá khứ, qua những sự kiện lịch sử quan trọng, giúp hiểu rõ hơn về những điều đã định hình thế giới hôm nay.",
            "Một cuộc phiêu lưu đầy kịch tính trên biển cả, nơi mà những thử thách và những quyết định sống còn đang chờ đón nhân vật chính.",
            "Câu chuyện kinh dị về một ngôi nhà ma ám, nơi mà những bí ẩn về cái chết của các cư dân trước đây vẫn còn được chôn giấu.",
            "Một mối tình lãng mạn nảy nở giữa hai người xa lạ trong bối cảnh một thành phố xinh đẹp, nơi họ khám phá những bí mật của nhau.",
            "Cuốn sách này cung cấp những bài học quý giá về kỹ năng sống, giúp độc giả phát triển bản thân và vượt qua những thử thách trong cuộc sống."
        ];


        foreach ( $the_loai_mau as $ten_the_loai) {
            DB::table('the_loais')->insert([
                'ten_the_loai' => $ten_the_loai,
                'anh_the_loai' => fake()->imageUrl(),
                'mo_ta' => $mo_ta_mau[array_rand($mo_ta_mau)],
                'trang_thai' => 'hien',
                //                'trang_thai' => fake()->randomElement(['an', 'hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
