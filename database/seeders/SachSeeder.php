<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        $ten_sach_viet = [
            'Đắc nhân tâm',
            'Hành động ngay',
            'Đam mê không để làm cảnh',
            'Vết thương hoa hồng',
            'Sức mạnh của sự kỳ vọng',
            'Trùng tang',
            'Khi vết thương nằm xuống',
            'Muôn kiểu người chốn công sở',
            'Khoảng cách nào xem giữa chúng ta',
            'Giáo dục song ngữ',
            'Cái tôi trong tương tác xã hội',
            'Những chồi non hi vọng',
            'Vượt qua giông bão',
            'Dopamine Detox',
            'Thiền là gì',
            'Vì tình yêu Hà Nội',
            'Chia sẻ vì trái tim',
            'Ác duyên',
            'Án mạng kép ở vườn Địa Đàng',
            'Tổng đài kể chuyện lúc 0h'
        ];

        $tom_tat_sach = [
            'Đắc nhân tâm' => "Câu chuyện về sự trưởng thành và các vấn đề xã hội qua con mắt của một cô bé ở miền Nam nước Mỹ trong những năm 1930.",
            'Hành động ngay' => "Một câu chuyện tình yêu kinh điển giữa Elizabeth Bennet và Mr. Darcy, khám phá những định kiến và sự kiêu hãnh trong xã hội.",
            'Đam mê không để làm cảnh' => "Cuộc sống xa hoa của Jay Gatsby và cuộc tìm kiếm tình yêu thất bại trong bối cảnh thập niên 1920 ở Mỹ.",
            'Vết thương hoa hồng' => "Hành trình của thuyền trưởng Ahab trong việc truy đuổi cá voi trắng Moby Dick, tượng trưng cho sự báo thù và điên cuồng.",
            'Sức mạnh của sự kỳ vọng' => "Khắc họa cuộc sống của các nhân vật trong bối cảnh các cuộc chiến tranh Napoléon, bàn về số phận, tình yêu và chiến tranh.",
            'Trùng tang' => "Một cuộc hành trình tâm lý qua tâm trạng của Holden Caulfield, một thiếu niên cảm thấy lạc lõng trong xã hội.",
            'Khi vết thương nằm xuống' => "Cuộc chiến giữa cái thiện và cái ác trong thế giới Middle-earth, với cuộc hành trình của Frodo Baggins để tiêu hủy chiếc nhẫn quyền lực.",
            'Muôn kiểu người chốn công sở' => "Cuộc phiêu lưu của Bilbo Baggins, một hobbit bình thường, trong hành trình tìm kiếm kho báu và khám phá bản thân.",
            'Khoảng cách nào xem giữa chúng ta' => "Tiếp tục cuộc phiêu lưu của Bilbo và các bạn trên hành trình chống lại những thế lực đen tối và tìm kiếm an toàn cho quê hương.",
            'Giáo dục song ngữ' => "Một xã hội tương lai nơi con người bị kiểm soát bởi công nghệ, đặt ra câu hỏi về tự do và bản chất của hạnh phúc.",
            'Cái tôi trong tương tác xã hội' => "Hành trình tìm kiếm giấc mơ và bản thân của Santiago, một chàng trai chăn cừu, qua các nền văn hóa và triết lý.",
            'Những chồi non hi vọng' => "Câu chuyện về tình yêu và mất mát trong bối cảnh cuộc nội chiến Mỹ, với nhân vật chính Scarlett O'Hara.",
            'Vượt qua giông bão' => "Một cuộc hành trình khám phá bản thân và thế giới kỳ diệu của phép thuật và ảo thuật.",
            'Dopamine Detox' => "Câu chuyện về sự đấu tranh của những người nghèo khổ ở Pháp, phản ánh xã hội và các vấn đề đạo đức.",
            'Thiền là gì' => "Sự trưởng thành và sụp đổ của gia tộc Buendía trong một thị trấn hư cấu, khám phá những vòng lặp của lịch sử.",
            'Vì tình yêu Hà Nội' => "Khám phá sự tìm kiếm bản sắc và nơi chốn của những người di cư trong một thế giới đầy biến động.",
            'Chia sẻ vì trái tim' => "Cuộc hành trình tâm lý và tìm kiếm sự kết nối giữa con người và cuộc sống, trong bối cảnh hiện đại.",
            'Ác duyên' => "Khuyến khích người đọc tìm kiếm sự an yên và ý nghĩa trong cuộc sống hiện đại đầy bận rộn.",
            'Án mạng kép ở vườn Địa Đàng' => "Phân tích tâm lý và hành vi của đám đông, đưa ra cái nhìn sâu sắc về hành vi xã hội.",
            'Tổng đài kể chuyện lúc 0h' => "Câu chuyện tình yêu và sự hồi tưởng trong một bối cảnh mùa thu lãng mạn, thể hiện sự chuyển mình của cuộc sống."
        ];


        $imagePath = 'uploads/sach/';
        $the_loai_ids = DB::table('the_loais')->pluck('id')->toArray();
        $loai_sua = $faker->randomElement(['Sửa ảnh bìa', 'Sửa tên sách', 'Sửa thể loại']);
        $loai_sua_text = $faker->sentence(rand(3, 7));
        foreach ($ten_sach_viet as $ten_sach) {
            $fileName = strtolower(str_replace(' ', '_', $ten_sach)) . '.jpg';
            $gia_goc = $faker->numberBetween(100000, 1000000);
            // Sinh giá khuyến mãi sao cho nhỏ hơn giá gốc
            $gia_khuyen_mai = $faker->numberBetween(100000, $gia_goc - 10000);
            DB::table('saches')->insert([
                'user_id' => rand(1, 10),
                'the_loai_id' => $the_loai_ids[array_rand($the_loai_ids)],
                'ten_sach' => $ten_sach,
                'tac_gia' => $faker->name,
                'anh_bia_sach' => "{$imagePath}{$fileName}",
                'gia_goc' => $gia_goc,
                'tom_tat' => $tom_tat_sach[$ten_sach],
                'ngay_dang' => $faker->date(),
                'noi_dung_nguoi_lon' => $faker->randomElement(['co', 'khong']),
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'so_luong_da_ban' => $faker->numberBetween(1, 100),
//                'kiem_duyet' => $faker->randomElement(['cho_xac_nhan', 'tu_choi', 'duyet', 'ban_nhap']),
//                'trang_thai' => $faker->randomElement(['an', 'hien']),
                'kiem_duyet' => 'duyet',
                'trang_thai' => 'hien',
                'tinh_trang_cap_nhat' => $faker->randomElement(['da_full', 'tiep_tuc_cap_nhat']),
                'luot_xem' => $faker->numberBetween(10, 10000),
                'loai_sua' => $loai_sua,
                'loai_sua_text' => $loai_sua_text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
