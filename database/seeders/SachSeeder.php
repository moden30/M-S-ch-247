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
            'Ban Công Nhà Nọ',
            'Bàn Tay Ánh Sáng',
            'Bí Quyết Thành Công',
            'Chia Sẻ Vì Trái Tim',
            'Co Dau',
            'Cái Tôi Trong Tương Tác Xã Hội',
            'Dopamine Detox',
            'Giáo Dục Song Ngữ',
            'Hành Động Ngay',
            'Khi Vết Thương Nằm Xuống',
            'Kỳ Ai',
            'Làm Việc Nhóm',
            'Lãnh Đạo Bằng Sức Mạnh',
            'Lãnh Đạo Giỏi',
            'Những Chồi Non Hi Vọng',
            'Những Năm Tháng Ấy',
            'Qua Những Vần Thơ',
            'Quản lý 80',
            'Sự Trỗi Dậy Và Suy Tàn',
            'Thi Nhân Việt Nam',
            'Think Git',
            'Thiền Là Gì',
            'Trí Tuệ Cảm Xúc',
            'Tuyết Trắng Trên Đồi',
            'Tôi Muốn Trở Thành Lãnh Đạo',
            'Vì Tình Yêu Hà Nội',
            'Vượt Qua Giông Bão',
            'Vết Thương Hoa Hồng',
            'Ác Duyên',
            'Án Mạng Kép Ở Vườn Địa Đàng',
            'Đam Mê Không Để Làm Cảnh',
            'Đoc Vị Bất Kì Ai',
            'Đâp Nồi Bán Sắt',
            'Đắc Nhân Tâm'
        ];

        $tom_tat_sach = [
            'Ban Công Nhà Nọ' => "Cuốn sách khám phá cuộc sống của những con người thành thị qua góc nhìn từ ban công nhà họ, nơi chứng kiến niềm vui, nỗi buồn của cuộc sống.",
            'Bàn Tay Ánh Sáng' => "Hành trình của một nhân vật tìm kiếm ánh sáng trong cuộc sống, vượt qua những khó khăn và thử thách để tìm thấy chính mình.",
            'Bí Quyết Thành Công' => "Cuốn sách chia sẻ những bí quyết và phương pháp để đạt được thành công, giúp độc giả tìm thấy con đường riêng cho bản thân.",
            'Chia Sẻ Vì Trái Tim' => "Những câu chuyện xúc động về tình yêu thương và lòng nhân ái, khuyến khích con người sống yêu thương và chia sẻ với nhau.",
            'Co Dau' => "Một câu chuyện về tình yêu và hy sinh, theo chân cuộc sống của cô dâu trong những khó khăn và thử thách của hôn nhân.",
            'Cái Tôi Trong Tương Tác Xã Hội' => "Khám phá về bản thân và mối quan hệ với người khác trong xã hội, giúp độc giả hiểu hơn về vai trò của cái tôi trong các mối quan hệ.",
            'Dopamine Detox' => "Cách thức làm giảm sự phụ thuộc vào dopamine trong xã hội hiện đại, mang lại cái nhìn về việc tìm kiếm hạnh phúc bền vững.",
            'Giáo Dục Song Ngữ' => "Phân tích lợi ích và thách thức của giáo dục song ngữ trong bối cảnh toàn cầu hóa và tầm quan trọng của ngôn ngữ.",
            'Hành Động Ngay' => "Khuyến khích người đọc không trì hoãn, hành động ngay để đạt được mục tiêu, với các câu chuyện truyền cảm hứng và thực tiễn.",
            'Khi Vết Thương Nằm Xuống' => "Những nỗi đau trong quá khứ và hành trình chữa lành, giúp con người tìm thấy sự bình yên trong tâm hồn.",
            'Kỳ Ai' => "Cuộc phiêu lưu đầy bí ẩn của một nhân vật kỳ lạ, mang đến những bài học sâu sắc về tình bạn và lòng dũng cảm.",
            'Làm Việc Nhóm' => "Các kỹ năng cần thiết để làm việc nhóm hiệu quả, giúp xây dựng một môi trường làm việc hài hòa và thành công.",
            'Lãnh Đạo Bằng Sức Mạnh' => "Những bài học lãnh đạo giúp người đọc phát huy sức mạnh và dẫn dắt người khác với lòng kiên định và trách nhiệm.",
            'Lãnh Đạo Giỏi' => "Cẩm nang cho những nhà lãnh đạo muốn phát triển kỹ năng quản lý và xây dựng đội ngũ mạnh mẽ.",
            'Những Chồi Non Hi Vọng' => "Những câu chuyện cảm động về niềm hy vọng và sự vươn lên từ những khó khăn trong cuộc sống.",
            'Những Năm Tháng Ấy' => "Hồi ức về những năm tháng đẹp đẽ, đầy hoài niệm và sự tiếc nuối, mang lại cảm giác ấm áp cho người đọc.",
            'Qua Những Vần Thơ' => "Những bài thơ tâm huyết với lời thơ đầy cảm xúc, phản ánh tình yêu và cuộc sống của tác giả.",
            'Quản lý 80' => "Phương pháp quản lý hiệu quả với nguyên tắc 80/20, giúp người đọc tối ưu hóa công việc và cuộc sống.",
            'Sự Trỗi Dậy Và Suy Tàn' => "Cuộc đời của một gia tộc qua các thăng trầm, phản ánh sự vô thường và những bài học cuộc sống.",
            'Thi Nhân Việt Nam' => "Tuyển tập những bài thơ nổi tiếng của các thi nhân Việt Nam, mang đậm bản sắc và tinh thần dân tộc.",
            'Think Git' => "Hướng dẫn sử dụng Git cho người mới bắt đầu, giúp họ nắm vững các thao tác và tư duy về quản lý mã nguồn.",
            'Thiền Là Gì' => "Giới thiệu về thiền và lợi ích của thiền trong việc tìm kiếm sự bình an và thấu hiểu chính mình.",
            'Trí Tuệ Cảm Xúc' => "Các kỹ năng về trí tuệ cảm xúc, giúp người đọc hiểu và quản lý cảm xúc trong các mối quan hệ cá nhân và công việc.",
            'Tuyết Trắng Trên Đồi' => "Câu chuyện tình yêu buồn trong khung cảnh mùa đông, nơi sự xa cách và mong nhớ trở thành đề tài chính.",
            'Tôi Muốn Trở Thành Lãnh Đạo' => "Các bước cơ bản và những bài học cần thiết cho người muốn trở thành nhà lãnh đạo tài ba.",
            'Vì Tình Yêu Hà Nội' => "Tình yêu và nỗi nhớ Hà Nội qua từng góc phố, món ăn, và cuộc sống của những người con xa xứ.",
            'Vượt Qua Giông Bão' => "Những câu chuyện vượt qua nghịch cảnh và thử thách để trưởng thành và mạnh mẽ hơn.",
            'Vết Thương Hoa Hồng' => "Cuộc hành trình đầy cảm xúc của nhân vật chính trong việc vượt qua nỗi đau và tìm lại niềm vui trong cuộc sống.",
            'Ác Duyên' => "Một câu chuyện xoay quanh mối tình đau khổ, với những bài học về duyên số và tình yêu.",
            'Án Mạng Kép Ở Vườn Địa Đàng' => "Một vụ án mạng kỳ bí trong khu vườn, mang đến cảm giác hồi hộp và những bất ngờ.",
            'Đam Mê Không Để Làm Cảnh' => "Câu chuyện về đam mê và ước mơ, khuyến khích người đọc theo đuổi những điều mình yêu thích.",
            'Đoc Vị Bất Kì Ai' => "Hướng dẫn về kỹ năng phân tích tâm lý và nắm bắt suy nghĩ của người khác để giao tiếp hiệu quả hơn.",
            'Đâp Nồi Bán Sắt' => "Bài học kinh doanh từ những thương gia thành công, giúp người đọc phát triển kỹ năng đàm phán và kinh doanh.",
            'Đắc Nhân Tâm' => "Cuốn sách kinh điển về nghệ thuật giao tiếp, hướng dẫn cách tạo thiện cảm và ảnh hưởng tích cực đến người khác."
        ];



        $imagePath = 'uploads/sach/';
        $the_loai_ids = DB::table('the_loais')->pluck('id')->toArray();
        $user_ids = DB::table('users')->pluck('id');
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 35; $i++) {
            $ten_sach = $ten_sach_viet[$i % count($ten_sach_viet)];
            $fileName = strtolower(str_replace(' ', '_', $ten_sach)) . '.jpg';
            $gia_goc = $faker->numberBetween(100000, 1000000);
            $gia_khuyen_mai = $faker->numberBetween(100000, $gia_goc - 10000);
            $loai_sua = $faker->randomElement(['Sửa ảnh bìa', 'Sửa tên sách', 'Sửa thể loại']);
            $loai_sua_text = $faker->sentence(rand(3, 7));


            DB::table('saches')->insert([
                'user_id' => $faker->randomElement($user_ids),
                'the_loai_id' => $the_loai_ids[array_rand($the_loai_ids)],
                'ten_sach' => $ten_sach,
                'anh_bia_sach' => "{$imagePath}{$fileName}",
                'gia_goc' => $gia_goc,
                'tom_tat' => $tom_tat_sach[$ten_sach],
                'ngay_dang' => $faker->date(),
                'noi_dung_nguoi_lon' => $faker->randomElement(['co', 'khong']),
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'so_luong_da_ban' => $faker->numberBetween(1, 100),
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
