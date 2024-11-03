<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseImagePath = 'uploads/bai-viet/';
        $fileName = [
            'bai_viet_1.jpg',
            'bai_viet_2.png',
            'bai_viet_3.png',
            'bai_viet_4.png',
            'bai_viet_5.jpg',
            'bai_viet_6.jpg',
            'bai_viet_7.jpg',
            'bai_viet_8.jpg',
            'bai_viet_9.jpg',
            'bai_viet_10.png',
            'bai_viet_11.png',
            'bai_viet_12.png',
            'bai_viet_13.jpg',
            'bai_viet_14.png',
            'bai_viet_15.jpg',
            'bai_viet_16.png',
            'bai_viet_17.jpg',
            'bai_viet_18.jpg',
            'bai_viet_19.jpg',
            'bai_viet_20.jpg',
        ];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('bai_viets')->insert([
                'user_id' => rand(1, 10),
                'chuyen_muc_id' => rand(1, 10),
                'hinh_anh' => $baseImagePath . $fileName[$i - 1],
                'tieu_de' => $this->generateRandomTitle(),
                'noi_dung' => $this->generateLongText(),
                'ngay_dang' => fake()->date(),
                'trang_thai' => 'hien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateLongText(): string
    {
        // Mảng chứa các đoạn văn mẫu bằng tiếng Việt
        $sampleTexts = [
            'Đây là nội dung bài viết số 1. Nội dung bài viết này cung cấp thông tin về sự phát triển của công nghệ thông tin trong những năm gần đây.',
            'Bài viết thứ 2 này tập trung vào việc phân tích các khía cạnh quan trọng của giáo dục trực tuyến và lợi ích của nó cho sinh viên.',
            'Ở bài viết thứ 3, chúng ta sẽ thảo luận về tầm quan trọng của việc học ngôn ngữ thứ hai và cách nó mở rộng cơ hội nghề nghiệp.',
            'Nội dung bài viết số 4 đề cập đến các xu hướng mới trong ngành công nghiệp thực phẩm và cách người tiêu dùng đang thay đổi thói quen mua sắm.',
            'Bài viết thứ 5 sẽ giới thiệu các kỹ năng cần thiết để thành công trong cuộc sống, bao gồm khả năng giao tiếp và tư duy phản biện.',
            'Đoạn văn mẫu tiếp theo nói về tầm quan trọng của sức khỏe tâm thần trong xã hội hiện đại và các cách để duy trì tinh thần lạc quan.',
            'Bài viết thứ 7 sẽ chia sẻ những trải nghiệm du lịch tại các địa điểm nổi tiếng trên thế giới, từ Paris đến Tokyo.',
            'Trong bài viết số 8, chúng ta sẽ xem xét tác động của biến đổi khí hậu và các biện pháp mà mỗi người có thể thực hiện để bảo vệ môi trường.',
            'Bài viết thứ 9 sẽ khám phá thế giới của các loại hình nghệ thuật truyền thống và cách chúng phản ánh văn hóa của mỗi quốc gia.',
            'Nội dung bài viết số 10 sẽ giới thiệu các xu hướng công nghệ mới nhất trong lĩnh vực ô tô và phương tiện di chuyển thông minh.',
            'Bài viết số 11 này sẽ nói về tầm quan trọng của việc đọc sách và ảnh hưởng tích cực của nó đối với sự phát triển cá nhân.',
            'Bài viết thứ 12 sẽ phân tích các vấn đề xã hội đang nổi bật hiện nay, từ bất bình đẳng đến quyền lợi con người.',
            'Bài viết số 13 sẽ nói về những lợi ích của việc tập thể dục đều đặn và cách duy trì một lối sống lành mạnh.',
            'Trong bài viết số 14, chúng ta sẽ tìm hiểu về các mô hình kinh doanh bền vững và cách chúng góp phần vào sự phát triển của cộng đồng.',
            'Bài viết số 15 sẽ khám phá thế giới của các trò chơi điện tử và cách chúng ảnh hưởng đến giới trẻ ngày nay.',
            'Bài viết số 16 sẽ thảo luận về vai trò của nghệ thuật trong việc kết nối con người và tạo ra những trải nghiệm cảm xúc.',
            'Bài viết thứ 17 sẽ cung cấp cái nhìn sâu sắc về các sản phẩm công nghệ mới và cách chúng đang thay đổi cuộc sống hàng ngày của chúng ta.',
            'Bài viết số 18 sẽ đưa ra những lời khuyên về cách quản lý tài chính cá nhân một cách hiệu quả.',
            'Bài viết thứ 19 sẽ nói về các chiến lược phát triển bản thân và cách tìm kiếm động lực trong cuộc sống.',
            'Cuối cùng, bài viết thứ 20 sẽ xem xét các xu hướng văn hóa đang hình thành và cách chúng ảnh hưởng đến xã hội hiện đại.',
        ];

        $chosenText = $sampleTexts[array_rand($sampleTexts)];
        $longText = str_repeat($chosenText . ' ', 100);

        return $longText;
    }

    private function generateRandomTitle(): string
    {
        // Tạo tiêu đề ngẫu nhiên
        $titles = [
            'Khám Phá Thế Giới Sách',
            'Lợi Ích Của Đọc Sách Mỗi Ngày',
            'Top 10 Cuốn Sách Nên Đọc Trong Đời',
            'Sách Hay Về Kinh Doanh',
            'Thế Giới Văn Học Việt Nam',
            'Cách Tạo Dựng Thói Quen Đọc Sách',
            'Những Cuốn Sách Truyền Cảm Hứng',
            'Văn Học Việt Nam: Di Sản Văn Hóa',
            'Tại Sao Nên Học Một Ngôn Ngữ Mới?',
            'Xu Hướng Đọc Sách Trong Thế Giới Số',
        ];

        return $titles[array_rand($titles)];
    }

}
