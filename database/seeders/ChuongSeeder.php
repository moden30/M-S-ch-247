<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Faker\Factory as Faker;

class ChuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        $tieu_de_viet = [
            'Cuộc sống hiện đại và những thách thức mới',
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
            'Những kỹ năng cần thiết để thành công trong thế kỷ 21'
        ];


        $noi_dung_mau = [
            'Trong thời đại hiện nay, công nghệ đã trở thành một phần không thể thiếu trong cuộc sống hàng ngày của chúng ta. Từ việc sử dụng điện thoại thông minh, máy tính xách tay cho đến việc truy cập Internet, tất cả đều đang góp phần thay đổi cách chúng ta làm việc, học tập và giải trí. Tuy nhiên, việc phụ thuộc quá nhiều vào công nghệ cũng khiến con người gặp phải nhiều vấn đề, đặc biệt là về sức khỏe và sự cân bằng trong cuộc sống.',
            'Một trong những điều quan trọng nhất trong cuộc sống là biết cách duy trì sự cân bằng giữa công việc và cuộc sống cá nhân. Nhiều người thường quá tập trung vào công việc mà quên mất việc chăm sóc cho bản thân và gia đình. Điều này có thể dẫn đến căng thẳng, mệt mỏi và giảm hiệu quả làm việc. Vì vậy, việc quản lý thời gian một cách khoa học và biết cách sắp xếp ưu tiên là rất cần thiết.',
            'Việc giáo dục trong thời đại số đã thay đổi rất nhiều so với trước đây. Học sinh và sinh viên giờ đây có thể tiếp cận với vô số tài liệu học tập từ khắp nơi trên thế giới chỉ với một vài cú nhấp chuột. Tuy nhiên, điều này cũng đòi hỏi mỗi người cần phải có kỹ năng phân tích và chọn lọc thông tin để tránh rơi vào tình trạng bị quá tải thông tin.',
            'Cuộc cách mạng công nghiệp 4.0 mang đến cho chúng ta nhiều cơ hội phát triển, nhưng cũng đặt ra không ít thách thức. Những công nghệ mới như trí tuệ nhân tạo, Internet vạn vật và tự động hóa đang thay đổi cách con người làm việc và sinh sống. Tuy nhiên, chúng ta cần phải chuẩn bị tốt về mặt kỹ năng và kiến thức để không bị lạc hậu trong bối cảnh toàn cầu hóa này.',
            'Biến đổi khí hậu là một trong những thách thức lớn nhất mà thế giới đang phải đối mặt. Nhiều quốc gia đang chịu ảnh hưởng nghiêm trọng từ các hiện tượng thời tiết cực đoan như bão, lũ lụt và hạn hán. Điều này đòi hỏi mỗi người chúng ta cần phải có ý thức bảo vệ môi trường và tìm ra những giải pháp bền vững để giảm thiểu tác động của biến đổi khí hậu.',
            'Trong xã hội hiện đại, việc duy trì sức khỏe tinh thần cũng quan trọng không kém so với sức khỏe thể chất. Áp lực từ công việc, học tập và cuộc sống hàng ngày có thể khiến nhiều người cảm thấy mệt mỏi và căng thẳng. Để giữ cho tâm trí luôn bình an, việc tham gia các hoạt động giải trí, thể thao và duy trì lối sống lành mạnh là rất quan trọng.',
            'Một trong những lợi ích lớn nhất của việc đọc sách là giúp con người mở mang kiến thức và cải thiện kỹ năng tư duy. Sách là nguồn tri thức vô tận, từ đó con người có thể học hỏi những điều mới mẻ và phát triển bản thân. Dù công nghệ có phát triển đến đâu, thói quen đọc sách vẫn luôn là điều cần thiết để nâng cao trí tuệ.',
            'Gia đình luôn là nền tảng vững chắc trong cuộc sống của mỗi người. Dù ở bất kỳ giai đoạn nào của cuộc đời, sự ủng hộ và yêu thương từ gia đình luôn giúp chúng ta vượt qua những khó khăn và thách thức. Trong xã hội hiện đại, việc giữ gìn mối quan hệ gia đình bền vững đòi hỏi mỗi người cần phải dành nhiều thời gian và sự quan tâm hơn cho những người thân yêu.',
            'Khởi nghiệp là một hành trình đầy thách thức nhưng cũng vô cùng hấp dẫn. Để thành công trong việc khởi nghiệp, không chỉ cần có ý tưởng sáng tạo mà còn phải có sự kiên trì, nỗ lực và khả năng quản lý tốt. Thị trường ngày càng cạnh tranh gay gắt, do đó, những doanh nhân trẻ cần phải không ngừng học hỏi và phát triển để có thể vươn lên trong thế giới kinh doanh đầy biến động.',
            'Sự phát triển của trí tuệ nhân tạo (AI) đang mở ra nhiều cơ hội mới trong nhiều lĩnh vực, từ y tế, giáo dục đến giao thông và giải trí. Tuy nhiên, AI cũng đặt ra nhiều vấn đề về đạo đức, bảo mật và sự phụ thuộc quá mức vào công nghệ. Việc quản lý và phát triển AI một cách bền vững sẽ là chìa khóa để chúng ta tận dụng tối đa tiềm năng của công nghệ này.',
            'Trong cuộc sống hiện đại, việc sở hữu những kỹ năng mềm như kỹ năng giao tiếp, làm việc nhóm và giải quyết vấn đề trở nên vô cùng quan trọng. Những kỹ năng này không chỉ giúp chúng ta thành công trong công việc mà còn cải thiện mối quan hệ xã hội và chất lượng cuộc sống. Do đó, việc rèn luyện và phát triển kỹ năng mềm cần được chú trọng hơn trong môi trường giáo dục hiện nay.',
            'Với sự bùng nổ của mạng xã hội, việc chia sẻ thông tin và giao tiếp với bạn bè, gia đình trở nên dễ dàng hơn bao giờ hết. Tuy nhiên, mạng xã hội cũng mang lại nhiều hệ lụy, như tình trạng nghiện mạng, lãng phí thời gian và nguy cơ bảo mật thông tin cá nhân. Vì vậy, chúng ta cần biết cách sử dụng mạng xã hội một cách có trách nhiệm và hiệu quả để tránh những tác động tiêu cực.',
            'Để có thể phát triển bền vững trong cuộc sống, mỗi người cần phải không ngừng học hỏi và hoàn thiện bản thân. Việc tự học không chỉ giúp con người mở rộng kiến thức mà còn rèn luyện tính kỷ luật và sự kiên nhẫn. Dù ở bất kỳ giai đoạn nào của cuộc đời, tinh thần học hỏi không ngừng luôn là chìa khóa dẫn đến thành công.',
            'Khoa học và công nghệ đang góp phần làm thay đổi ngành y tế một cách nhanh chóng. Những tiến bộ trong công nghệ y học như thiết bị chẩn đoán tiên tiến, phương pháp điều trị hiện đại và các loại thuốc mới đã giúp kéo dài tuổi thọ và cải thiện chất lượng cuộc sống cho hàng triệu người. Tuy nhiên, việc sử dụng công nghệ trong y tế cũng đòi hỏi sự cân nhắc về mặt đạo đức và bảo mật thông tin bệnh nhân.',
            'Ngày nay, nhiều người trẻ đang đối mặt với áp lực lớn từ công việc và cuộc sống. Để có thể vượt qua những thử thách này, việc giữ cho tâm lý ổn định và biết cách thư giãn là rất quan trọng. Yoga, thiền và các hoạt động thể thao là những cách hữu hiệu giúp chúng ta giảm căng thẳng và duy trì trạng thái tinh thần khỏe mạnh.',
            'Mặc dù công nghệ mang lại nhiều tiện ích, nhưng việc sử dụng quá nhiều các thiết bị điện tử cũng có thể gây hại cho sức khỏe. Các vấn đề như đau lưng, cận thị và căng thẳng tinh thần ngày càng trở nên phổ biến ở những người dành nhiều thời gian trước màn hình máy tính. Để bảo vệ sức khỏe, chúng ta cần phải biết cách quản lý thời gian sử dụng thiết bị điện tử và thường xuyên tập thể dục.',
            'Một trong những xu hướng nổi bật của thế kỷ 21 là sự phát triển của nền kinh tế chia sẻ. Từ các dịch vụ chia sẻ xe, chia sẻ nhà ở đến chia sẻ kiến thức và kỹ năng, mô hình này đã giúp tối ưu hóa việc sử dụng tài nguyên và giảm chi phí cho người dùng. Tuy nhiên, nền kinh tế chia sẻ cũng đặt ra nhiều thách thức về pháp lý, quyền lợi và bảo mật thông tin.',
            'Ngành du lịch đang trở thành một trong những ngành kinh tế mũi nhọn của nhiều quốc gia trên thế giới. Việt Nam với bề dày lịch sử, văn hóa và cảnh quan thiên nhiên tuyệt đẹp đã thu hút hàng triệu du khách quốc tế mỗi năm. Tuy nhiên, để phát triển du lịch bền vững, cần có những chính sách và quy hoạch hợp lý nhằm bảo vệ môi trường và di sản văn hóa.',
            'Cuộc sống hiện đại với sự phát triển của công nghệ đã mang lại cho con người nhiều tiện ích nhưng cũng đặt ra không ít thách thức. Việc phụ thuộc quá nhiều vào công nghệ có thể khiến con người dần mất đi sự kết nối thực sự với thế giới xung quanh. Để có thể tận dụng tốt nhất những lợi ích mà công nghệ mang lại, chúng ta cần biết cách sử dụng nó một cách hợp lý và cân bằng.',
            'Trong thế giới ngày càng toàn cầu hóa, việc học ngoại ngữ trở nên quan trọng hơn bao giờ hết. Ngoại ngữ không chỉ giúp chúng ta giao tiếp với người nước ngoài mà còn mở ra nhiều cơ hội học tập, làm việc và trải nghiệm văn hóa đa dạng. Để học ngoại ngữ hiệu quả, ngoài việc tham gia các lớp học, chúng ta cần rèn luyện kỹ năng tự học và thường xuyên thực hành.',
            'Lối sống lành mạnh là yếu tố quan trọng giúp con người duy trì sức khỏe và tinh thần minh mẫn. Để có được lối sống lành mạnh, chúng ta cần phải duy trì chế độ ăn uống cân đối, tập thể dục thường xuyên và biết cách thư giãn. Việc chăm sóc sức khỏe không chỉ giúp kéo dài tuổi thọ mà còn nâng cao chất lượng cuộc sống.',
            'Cuộc cách mạng số đang thay đổi cách chúng ta sống, làm việc và giao tiếp. Các công nghệ mới như trí tuệ nhân tạo, blockchain và thực tế ảo đang mở ra nhiều cơ hội nhưng cũng đòi hỏi con người phải liên tục cập nhật và thích nghi với những thay đổi. Để không bị bỏ lại phía sau, chúng ta cần trang bị cho mình kiến thức và kỹ năng để đối mặt với những thách thức của thời đại số.',
            'Giáo dục không chỉ là quá trình truyền đạt kiến thức mà còn là việc rèn luyện nhân cách và phát triển toàn diện con người. Một nền giáo dục chất lượng cao không chỉ giúp học sinh đạt được thành tích tốt mà còn trang bị cho họ những kỹ năng sống cần thiết để đối mặt với những thử thách trong cuộc sống. Vì vậy, việc cải cách giáo dục cần được chú trọng để đáp ứng nhu cầu phát triển của xã hội.',
            'Trong bối cảnh biến đổi khí hậu ngày càng nghiêm trọng, việc bảo vệ môi trường trở thành trách nhiệm của mỗi cá nhân và tổ chức. Các hoạt động như tái chế, giảm tiêu thụ nhựa và tiết kiệm năng lượng có thể giúp giảm thiểu tác động tiêu cực đến môi trường. Để đảm bảo sự phát triển bền vững, cần có sự chung tay của toàn xã hội trong việc bảo vệ môi trường sống.',
            'Sự phát triển của ngành công nghiệp giải trí đang tạo ra nhiều cơ hội cho những người trẻ đam mê nghệ thuật và sáng tạo. Tuy nhiên, để thành công trong ngành công nghiệp này, ngoài tài năng, bạn cần có sự kiên trì, nỗ lực không ngừng và khả năng thích nghi với những thay đổi nhanh chóng của thị trường. Điều quan trọng là phải luôn học hỏi và hoàn thiện bản thân để theo kịp xu hướng.',
            'Cuộc sống gia đình là nền tảng vững chắc giúp con người phát triển và đạt được thành công trong cuộc sống. Trong gia đình, mỗi người đều có vai trò và trách nhiệm riêng, nhưng điều quan trọng nhất vẫn là tình yêu thương và sự quan tâm lẫn nhau. Một gia đình hạnh phúc không chỉ mang lại niềm vui mà còn là nguồn động lực giúp chúng ta vượt qua những khó khăn và thử thách.',
            'Nền kinh tế số đang mở ra nhiều cơ hội mới cho doanh nghiệp và người tiêu dùng. Từ việc mua sắm trực tuyến, thanh toán điện tử cho đến các dịch vụ tài chính số, tất cả đều giúp tăng cường hiệu quả và tiết kiệm thời gian. Tuy nhiên, để tận dụng tối đa lợi ích từ nền kinh tế số, chúng ta cần phải hiểu rõ về các công nghệ mới và biết cách ứng dụng chúng một cách hợp lý.',
            'Một trong những kỹ năng quan trọng nhất trong cuộc sống hiện đại là kỹ năng quản lý thời gian. Việc biết cách sắp xếp công việc và thời gian hợp lý sẽ giúp bạn đạt được hiệu quả cao hơn trong công việc và cuộc sống cá nhân. Để quản lý thời gian tốt, bạn cần phải đặt ra các mục tiêu rõ ràng, biết cách ưu tiên và không ngừng hoàn thiện bản thân.',
            'Ngày nay, với sự phát triển mạnh mẽ của công nghệ thông tin, dữ liệu trở thành một trong những tài sản quý giá nhất. Các doanh nghiệp và tổ chức đang sử dụng dữ liệu để phân tích thị trường, cải thiện sản phẩm và dịch vụ, cũng như đưa ra các quyết định kinh doanh chiến lược. Tuy nhiên, việc thu thập và sử dụng dữ liệu cũng đặt ra nhiều vấn đề về quyền riêng tư và bảo mật thông tin cá nhân.',
            'Lòng yêu nước không chỉ thể hiện qua những hành động lớn lao mà còn qua những việc làm nhỏ hàng ngày. Mỗi người trong chúng ta có thể đóng góp cho đất nước bằng cách thực hiện tốt công việc của mình, bảo vệ môi trường và giữ gìn văn hóa dân tộc. Để xây dựng một đất nước phát triển và thịnh vượng, sự cống hiến của từng cá nhân là rất quan trọng.',
            'Trong thế giới hiện đại, các công việc đòi hỏi khả năng làm việc nhóm ngày càng trở nên phổ biến. Việc hợp tác hiệu quả trong nhóm không chỉ giúp đạt được mục tiêu chung mà còn giúp phát huy tối đa tiềm năng của từng cá nhân. Tuy nhiên, để làm việc nhóm hiệu quả, mỗi người cần phải biết lắng nghe, tôn trọng ý kiến của người khác và có kỹ năng giải quyết xung đột.',
        ];

        for ($sach_id = 1; $sach_id <= 20; $sach_id++) {
            $soChuong = rand(10, 11);
            $loai_sua = $faker->randomElement(['Sửa tên chương', 'Sửa nội dung chương']);
            $loai_sua_text = $faker->sentence(rand(3, 7));
            for ($chuong = 1; $chuong <= $soChuong; $chuong++) {
                DB::table('chuongs')->insert([
                    'sach_id' => $sach_id,
                    'tieu_de' => $faker->randomElement($tieu_de_viet),
                    'noi_dung' => implode("\n\n", array_map(function() use ($noi_dung_mau) {
                        return $noi_dung_mau[array_rand($noi_dung_mau)];
                    }, range(1, rand(10, 20)))),
                    'so_chuong' => $chuong,
                    'ngay_len_song' => $faker->date(),
//                    'trang_thai' => $faker->randomElement(['an', 'hien']),
//                    'kiem_duyet' => $faker->randomElement(['cho_xac_nhan', 'tu_choi', 'duyet', 'ban_nhap']),
                    'trang_thai' => 'hien',
                    'kiem_duyet' => 'duyet',
                    'loai_sua' => $loai_sua,
                    'loai_sua_text' => $loai_sua_text,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
