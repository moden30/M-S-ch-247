<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        $tieu_de_viet = [
            'Đánh giá sách mới phát hành',
            'Vai trò của công nghệ trong giáo dục thời đại số',
            'Tương lai của trí tuệ nhân tạo trong đời sống',
            'Làm sao để cân bằng giữa công việc và cuộc sống?',
            'Những điều cần biết về bảo mật thông tin cá nhân',
            'Tầm quan trọng của giáo dục trong kỷ nguyên công nghệ',
            'Biến đổi khí hậu và giải pháp bền vững',
            'Vai trò của đọc sách trong sự phát triển của con người',
            'Làm thế nào để đạt được sự cân bằng tinh thần?',
            'Cách phát triển kỹ năng mềm trong thời đại số',
            'Tầm quan trọng của gia đình trong cuộc sống hiện đại',
            'Kỹ năng quản lý thời gian hiệu quả cho người bận rộn',
            'Tương lai của công việc trong thế giới tự động hóa',
            'Cách mạng công nghiệp 4.0: Cơ hội và thách thức',
            'Làm thế nào để duy trì sức khỏe trong cuộc sống bận rộn?',
            'Tác động của mạng xã hội đến cuộc sống hàng ngày',
            'Những bước đầu tiên để khởi nghiệp thành công',
            'Phát triển bản thân thông qua việc học hỏi không ngừng',
            'Vai trò của khoa học và công nghệ trong y tế',
            'Những kỹ năng cần thiết để thành công trong thế kỷ 21',
            'Sách về tình yêu và các mối quan hệ',
            'Sách triết học và suy ngẫm',
            'Sách về nghệ thuật và văn hóa',
            'Sách cho trẻ em và thanh thiếu niên',
            'Sách về du lịch và khám phá thế giới',
            'Sách về kinh doanh và tài chính cá nhân',
            'Sách tự truyện và hồi ký',
            'Sách văn học cổ điển',
            'Sách hiện đại và tác phẩm nổi bật',
            'Sách khoa học và công nghệ',
            'Sách về sức khỏe và dinh dưỡng',
            'Sách về môi trường và bảo vệ trái đất',
            'Sách giáo dục và phát triển trẻ em',
            'Sách về phong cách sống và phát triển bản thân',
            'Sách về lịch sử và văn hóa dân tộc',
            'Sách tiểu thuyết và truyện ngắn',
            'Sách về thể thao và lối sống lành mạnh',
            'Sách tham khảo cho sinh viên',
            'Sách về kỹ năng mềm và phát triển nghề nghiệp',
            'Sách về tâm lý học và hành vi con người',
            'Sách viết về các nhân vật nổi tiếng',
            'Sách về thần thoại và huyền bí'
        ];

        foreach ($tieu_de_viet as $tenChuyenMuc) {
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => $tenChuyenMuc, // Sử dụng tên chuyên mục từ danh sách
                'chuyen_muc_cha_id' => null, // Các chuyên mục gốc không có cha
                'trang_thai' => 'hien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Lấy tất cả các ID của các chuyên mục đã tạo (chuyên mục gốc)
        $parentIds = DB::table('chuyen_mucs')->pluck('id');

        // Tạo chuyên mục con cho các chuyên mục gốc
        for ($i = 1; $i <= 5; $i++) {
            $chuyenMucChaId = $parentIds->random(); // Chọn ngẫu nhiên chuyên mục cha

            // Tạo chuyên mục con cấp 1
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => fake()->words(3, true),
                'chuyen_muc_cha_id' => $chuyenMucChaId, // Gán chuyên mục cha ngẫu nhiên
                'trang_thai' => 'hien',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Lấy ID của chuyên mục con vừa tạo
            $lastInsertedId = DB::getPdo()->lastInsertId();

            // Tạo thêm chuyên mục con cấp 2 và cấp 3 cho chuyên mục con vừa tạo
            for ($j = 1; $j <= 2; $j++) {
                DB::table('chuyen_mucs')->insert([
                    'ten_chuyen_muc' => fake()->words(3, true),
                    'chuyen_muc_cha_id' => $lastInsertedId, // Gán chuyên mục cha là chuyên mục con cấp 1
                    'trang_thai' => 'hien',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
