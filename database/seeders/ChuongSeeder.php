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
            'Những kỹ năng cần thiết để thành công trong thế kỷ 21',
            'Cách mạng xanh và nông nghiệp bền vững',
            'Sức mạnh của sáng tạo trong kinh doanh',
            'Thách thức và cơ hội của khởi nghiệp đổi mới sáng tạo',
            'Tầm quan trọng của sức khỏe tinh thần trong công việc',
            'Giá trị của việc học ngoại ngữ trong hội nhập quốc tế',
            'Làm thế nào để giảm thiểu áp lực trong cuộc sống hiện đại?',
            'Ảnh hưởng của văn hóa doanh nghiệp đến sự phát triển tổ chức',
            'Kinh tế chia sẻ và những thay đổi trong hành vi tiêu dùng',
            'Phát triển bền vững trong ngành công nghiệp giải trí',
            'Tương lai của năng lượng tái tạo và bảo vệ môi trường',
            'Những xu hướng giáo dục nổi bật trong thập kỷ tới',
            'Sự phát triển của thương mại điện tử và các mô hình kinh doanh mới',
            'Sự thay đổi trong phong cách sống của người trẻ hiện đại',
            'Tầm quan trọng của việc xây dựng thương hiệu cá nhân',
            'Phát triển kỹ năng lãnh đạo trong môi trường cạnh tranh toàn cầu',
        ];


        $noi_dung_mau = [
            '<p>Hắn đã theo dõi con mồi được ba ngày.</p>
                          <p>Con mồi của hắn là một gã đàn ông dơ dáy, bẩn thỉu, sống một mình trong căn nhà nát ở cuối phố Hoa Nhài. Nhìn mặt thì áng chừng bốn mươi đến bốn lăm tuổi, lúc nào cũng say xỉn bét nhè. Chính vì gã luôn có tiền mua rượu nên Tài xác định đây là con mồi tiềm năng.</p>
                          <p>Vấn đề duy nhất khiến hắn không dám vội vàng ra tay là người đàn ông này quá cao lớn. Gã cao hơn mét chín, trong khi Tài chỉ cao mét bảy. Riêng trọng lượng cơ thể của gã cũng đủ để đè chết Tài.</p>
                          <p>Trong ba ngày, hắn đã hiểu tương đối rõ về cuộc sống của người đàn ông này. Gã ngủ nướng đến tận trưa, sau đó buổi chiều ra quán rượu của bà Béo và ngồi dính đít ở đó cho đến đêm mới ngật ngưỡng ra về. Gã sẽ đi trên một đoạn đường tối om, vắng vẻ, chỉ có rác rưởi và chuột làm bạn.</p>
                          <p>Nhưng đó không phải là thời điểm thích hợp để ra tay. Lý do là bởi trên người gã chưa chắc đã mang theo nhiều tiền, và một cuộc vật lộn sẽ dẫn dụ những vị khách không mời. Có rất nhiều bóng ma âm thầm rình rập trên những con phố tưởng chừng yên tĩnh. Tài dự định chờ cho đến khi gã mở cửa vào nhà mới hạ thủ. Bốn bức tường sẽ giữ lại những âm thanh la hét. Sau khi người đàn ông chết, hắn cũng có nhiều thời gian để lục lọi căn nhà.</p>
                          <p>Đêm nay trời không trăng. Phố Hoa Nhài có điện nhưng đã bị những kẻ sống dựa vào bóng tối ném đá vỡ hết đèn đường, đâm ra người ta chỉ có thể bước đi trong mò mẫm. Điều này càng tiện cho Tài. Hắn núp sẵn ở một bức tường gần nhà của con mồi, yên lặng chờ đợi.</p>
                          <p>Hắn không có bất kỳ phương tiện nào để xem giờ. Đồng hồ là một xa xỉ phẩm. Thứ duy nhất mà hắn có là lòng kiên nhẫn. Hắn đã đứng ở trong góc tường suốt nhiều giờ đồng hồ mà không hề động đậy. Những người tồn tại được trong thế giới này đều phải sở hữu một vài đức tính ưu việt nào đó. Những kẻ chỉ dựa vào sức mạnh thể chất như gã đàn ông kia sớm muộn cũng phải chết.</p>
                          <p>Đã quá khuya mà vẫn chưa thấy động tĩnh gì. Ngay cả Tài cũng bắt đầu thấy sốt ruột. Hắn tự hỏi phải chăng thay vì trở về nhà con mồi của hắn lại lang thang đâu đó, dạo này thấy gã hay cợt nhả với bà Béo. Nếu gã đến ngủ ở nhà bà Béo thì thật là phí công vô ích. Đúng lúc gã còn đang phân vân thì nghe thấy tiếng bước chân lịch kịch ở đầu đường. Con mồi đã về. Tiếng chân này không nhầm được. Từ tiếng chân có thể thấy rằng gã đang đi không vững, tuy nhiên xem chừng gã không say như mọi hôm. Nhịp chân thay vì ngắt quãng lại vang lên khá đều đặn và có sức nặng.</p>
                          <p>Tình thế không được như kỳ vọng, nhưng Tài vẫn rất bình tĩnh. Tay hắn không hề đổ mồ hôi. Bộ dạng giống như con mèo đang thủ thế, trong cứng rắn đã có sẵn sự mềm mại. Hắn tiếp tục lắng nghe. Bước chân càng lúc càng gần. Gã đàn ông đã về đến trước cửa nhà, gã bắt đầu lục túi lấy chùm chìa khóa. Thật không may, gã đánh rơi chiếc chìa khóa xuống đất và thế là gã phải cúi xuống tìm kiếm, vừa tìm vừa chửi bới um lên. Đây lại là một sự cố nữa. Thời gian gã tìm càng lâu, càng khiến cho nhiều người xung quanh để ý hơn.</p>
                          <p>Một lúc sau, gã nhặt được chiếc chìa khóa lên. Gã tra chìa vào cánh cửa thép. Lúc tiếng chốt bật ra cũng là lúc Tài lao đến. Hắn bước ba bước ngắn, con dao cầm tay lướt nhanh qua cổ khiến máu phun ra có vòi, bởi vì nhanh quá mà gã đàn ông chỉ phát ra được những tiếng ú ớ nghe như người nói mơ. Hắn đẩy gã vào trong nhà, vòng chân đá cánh cửa đằng sau đóng lại và thuận đà cắm con dao vào chính giữa tim.</p>
                          <p>Trong bóng tối, hắn lắng nghe tiếng máu phun ra ồng ộc, cố gắng tìm kiếm dấu hiệu của sự sống. Không thấy. Gã đàn ông đã chết. Gã chịu hai vết thương rất nặng ở cổ và ngực, cả hai diễn ra chỉ cách nhau có vài giây, ngay cả khi gã có sức mạnh thể chất trời phú thì cũng không thể kháng cự lại những tổn thương ghê gớm như vậy.</p>
                          <p>Tài không có cảm giác tội lỗi, cũng không có cảm giác chiến thắng. Đây không phải là lần đầu tiên hắn giết người. Ở Vùng đất Tự do người ta phải giết người hoặc bị người khác giết.</p>',
            '<p>Tài cần tiền nhưng nếu hắn mờ mắt vì tiền thì hắn đã chết từ lâu. Mồi ngon luôn đi kèm với cạm bẫy, chân lý đó hắn đã rút ra được từ lúc bố hắn bị giết.</p>
                          <p>Hắn đóng cánh cửa tủ sách lại và vội vã rời khỏi căn nhà sau khi đã khóa cửa ra vào cẩn thận. Hắn giữ lại chìa khóa. Tốt nhất là hắn nên vứt cái chìa đi, nhưng như thế sẽ lãng phí kho tiền mà hắn không đành lòng.</p>
                          <p>Dù là Vùng đất Tự do cũng cần có tiền để sinh sống.</p>
                          <p>Hắn trở về nhà, nhà của hắn nằm trong một con hẻm ở phố Hoa Hồng. Hắn không biết tại sao người ta lại đặt tên những con phố như vậy, những cái tên nghe quá thơ mộng trong một vùng đất chỉ toàn máu tanh và chết chóc. Hoặc người chịu trách nhiệm đặt tên phố là một kẻ lãng mạn hoặc là người thích chơi khăm. Dù thế nào thì cái tên cũng chẳng ăn nhập gì với bầu không khí hiện nay.</p>
                          <p>Nhà hắn ở dưới một tầng hầm. Cả hai anh em hắn đều chỉ thỉnh thoảng mới ra khỏi hầm để mua thức ăn hoặc vũ khí.</p>
                          <p>Lúc hắn về, Trung đang lau chùi một khẩu súng.</p>
                          <p>Năm nay Trung mười ba tuổi, trên ngực lúc nào cũng đeo thẻ xanh, là một dấu hiệu cho thấy nó vẫn đang trong độ tuổi vị thành niên và do vậy được bảo vệ khỏi mọi hành động giết chóc. Những kẻ dám giết người đeo thẻ xanh sẽ bị đội Hiệp Sĩ trừng phạt.</p>
                          <p>Trung thấy anh về, liền cười tươi:</p>
                          <p>- Anh có thu hoạch gì không? Tài nhìn em, tự hỏi có nên kể hết mọi việc:</p>
                          <p>- Có thể có rủi ro.</p>
                          <p>- Rủi ro gì?</p>
                          <p>- Anh không biết. Kẻ anh giết có quá nhiều tiền.</p>
                          <p>- Vậy thì càng tốt chứ sao? Anh có mang tiền về không?</p>
                          <p>Trung nóng nảy hơn anh. Nó thích làm những việc có kết quả ngay và hiếm khi chịu chờ đợi.</p>
                          <p>Tài lắc đầu:</p>
                          <p>- Không.</p>
                          <p>- Tại sao?</p>
                          <p>- Anh muốn biết kẻ anh vừa giết là ai.</p>
                         <p>- Đằng nào anh cũng đã giết hắn rồi, biết thì cũng có ích gì? Có thể hắn cũng cướp của người nào đó.</p>
                          <p>Tài biết rằng nói nữa cũng vô ích, bèn không nói nữa. Hắn quen với việc hành động trong im lặng hơn là thuyết phục người khác.</p>
                          <p>Trung giơ khẩu súng lên, nhắm vào cái cốc nước để trên bàn:</p>
                          <p>- Em nghĩ em đã sẵn sàng để đi săn cùng anh.</p>
                          <p>- Mày còn quá bé.</p>
                          <p>- Có súng em không còn bé nữa.</p>
                          <p>- Mày dùng súng bắn người khác, mày mất tư cách đeo thẻ xanh.</p>
                          <p>- Thẻ xanh thì quan trọng gì? Hai người vẫn tốt hơn một chứ.</p>
                          <p>- Tao tự lo được. Rồi một ngày kia khi mày lớn lên, mày có thể đi cùng tao, nhưng chưa phải bây giờ.</p>
                          <p>Tài mỉm cười, xoa đầu em trai. Thằng bé trông rất giống bố của hai người.</p>
                          <p>Khi Tài mười tuổi, thảm họa hạt nhân diễn ra, mẹ của Tài bị chết ngay sau đợt tấn công đầu tiên. Bố của Tài đã mang hai anh em theo dòng người chạy nạn đến vùng đất này. Thời gian đầu tình thế rất hỗn loạn nhưng mọi người vẫn dè chừng nhau, hiếm có các hành động tấn công trắng trợn. Thế rồi Liên Minh Tự Do lên nắm quyền, ra tuyên bố rằng giết chóc người trên mười lăm tuổi là hợp pháp, từ đó mọi thứ bắt đầu trở nên điên loạn. Tất cả các sinh hoạt đều chuyển về đêm, đơn giản vì không ai dám đường hoàng đi lại giữa ban ngày, có thể chết bất cứ lúc nào bởi một phát đạn vu vơ. Trước đây súng rất phổ biến, sau bị đội Hiệp Sĩ tịch thu hết, chỉ còn tồn tại trên thị trường chợ đen với giá cắt cổ. Người ta giết nhau bằng dao như thời trung cổ vậy. Khẩu súng mà Trung đang cầm là do Tài giết người cướp được, cho em như món quà dùng để tự vệ.</p>
                          <p>Đối với Tài, Trung vẫn là một thằng bé non nớt. Hắn biết rằng nửa đêm Trung vẫn gọi tên mẹ, nhưng hắn không bao giờ đề cập đến chuyện ấy để khỏi làm cho em mình xấu hổ. Trung luôn tự cho rằng mình đã đủ mạnh mẽ để sống sót trong cái thế giới đảo điên ngoài kia, điều mà rõ ràng không phải. Tất cả những kẻ săn mồi có thành tựu đều cao hơn, khỏe hơn và tàn nhẫn hơn nó rất nhiều.</p>
                          <p>- Anh em mình sẽ làm trùm khu này. – Trung nói đầy vẻ tự tin. – Rồi anh xem.</p>
                          <p>Ở bên ngoài có tiếng gõ cửa.</p>
                          <p>Cả hai anh em cùng yên lặng. Chúng làm gì có hàng xóm?</p>
                          <p>Một lúc sau, tiếng gõ cửa lại vang lên.</p>
                          <p>Hai anh em vẫn yên lặng. Tài có thể nhìn thấy sự căng thẳng trong mắt em càng ngày càng đậm.</p>
                          <p>Vài giây trôi qua, bên ngoài, người kia vẫn kiên nhẫn gõ cửa.</p>
                          <p>Tài cầm lấy khẩu súng, ra hiệu cho em nấp vào góc nhà. Bản thân hắn ra đứng sát cạnh cửa, hỏi vọng ra:</p>
                          <p>- Ai?</p>
                          <p>- Đội Hiệp Sĩ đây.</p>
                          <p>- Các ông đến đây làm gì?</p>
                          <p>- Kiểm tra an ninh.</p>
                          <p>Đội Hiệp Sĩ vẫn kiểm tra an ninh theo một lịch trình không cố định. Mục đích của họ rất đa dạng và đôi khi là chẳng cần lý do nào cả. Tại Vùng đất Tự Do, đội Hiệp Sĩ là lực lượng quân sự mạnh nhất, được vũ trang tốt nhất và tập hợp những người giỏi nhất, chúng đại diện cho Liên Minh Tự Do và được quyền giết người không cần xét xử. Tất nhiên, ở cái nơi vô pháp vô thiên này không tồn tại tòa án, chúng chính là tòa án và chưa bao giờ phải chịu bất cứ hậu quả nào.</p>
                          <p>- Chúng tôi không làm gì để bị kiểm tra.</p>
                          <p>- Tao sẽ đếm đến ba. Nếu mày vẫn không mở cửa tao sẽ nướng chín cái nhà này. Một..</p>
                          <p>- Tôi mở cửa.</p>
                          <p>Tài cất súng vào trong người, từ từ mở cánh cửa ra.</p>
                          <p>Ba người đàn ông nhảy vào. Chúng mặc trang phục thông thường. Đây không phải là đội Hiệp Sĩ.</p>
                          <p>Gương mặt Tài tái nhợt. Hắn định rút súng, nhưng hai gã đàn ông đã giữ tay hắn lại. Gã thứ ba bắn súng điện đã được điều chỉnh tăng cường độ vào ngực hắn. Cơ thể của hắn trở nên co quắp. Sau vài giây, Tài gục xuống, mê man không biết gì nữa.</p>',
            '<p>Không biết bao lâu đã trôi qua.</p>
                        <p>Lúc tỉnh lại, việc đầu tiên Tài làm là tìm em trai, nhưng không thấy đâu. Hắn nhận ra mình đang bị trói trên sàn nhà, còn gã đàn ông bắn súng điện vào ngực hắn đang ngồi chễm trệ trên ghế.</p>
                        <p>Đó là một người đàn ông da đen, rất cao lớn. Đầu gã cạo trọc lốc, đôi môi thâm sì, dầy cộp tựa như chiếc bánh kẹp sandwich. Gã mặc áo phông đen, bắp chân bắp tay cuồn cuộn như vận động viên quyền anh.</p>
                        <p>- Em tao đâu? - Em mày là chiến lợi phẩm của bọn tao. Từ nay nó sẽ phải làm việc cho bọn tao.</p>
                        <p>Tài gục đầu xuống sàn nhà, lòng đau không thể tả.</p>
                        <p>Gã đàn ông vẫn đang quan sát hắn.</p>
                        <p>- Cả mày nữa, mày cũng phải làm việc cho bọn tao.</p>
                        <p>- Chúng mày là ai?</p>
                        <p>- Bọn tao là tổ chức sát thủ Con Kiến.</p>
                        <p>Tài không biết Con Kiến, nhưng hắn hiểu tương đối rõ về các tổ chức sát thủ cũng như các thế lực ở Vùng đất Tự Do.</p>
                        <p>Tại Vùng đất Tự Do không có các băng đảng bảo kê, tất cả những kẻ dám thu tô của bất kỳ ai dưới bất kỳ hình thức nào cũng là kẻ thù của đội Hiệp Sĩ và chúng sẽ tiêu diệt những kẻ ngu xuẩn này bằng mọi phương tiện.</p>
                        <p>Nhưng các tổ chức sát thủ lại được cho phép hoạt động. Điều này nghe có vẻ ngược đời nhưng lại rất hợp lý. Bởi vì Liên Minh Tự Do đã công khai xác nhận quyền giết chóc lẫn nhau, nên các tổ chức sát thủ được xem là hợp pháp, thậm chí còn không cần đăng ký với Liên Minh. Các đội sát thủ mọc lên như nấm và cạnh tranh với nhau để xem tổ chức nào hoạt động hiệu quả hơn, từ đó nhận được nhiều đơn hàng hơn và ít gặp phải kháng cự hơn.</p>
                        <p>Các tổ chức sát thủ cũng rất biết nhìn mặt nhau mà sống. Những tổ chức nhỏ không dám dùng những cái tên nghe quá hoành tráng vì như thế là thách thức các tổ chức lớn hơn, đồng nghĩa với tìm cái chết. Cũng giống như dân Việt Nam sống ở các vùng quê nghèo hay đặt những cái tên nghe rất quê mùa như thằng Cò, con Hĩm, con Dĩn để dễ nuôi, thì các tổ chức nhỏ cũng chỉ dám lấy những cái tên nghe ngu ngu để dễ sống.</p>
                        <p>Chỉ cần nghe từ Con Kiến đã biết tổ chức này bé như thế nào.</p>
                        <p>- Tại sao chúng mày lại nhằm vào anh em tao?</p>
                        <p>- Tối qua mày đã giết Anthony.</p>
                        <p>- Vậy ra thằng đó là Anthony. Thân phận thực sự của hắn là gì?</p>
                        <p>- Anthony là đại diện ở phố Hoa Nhài của nhóm Con Gà Con.</p>
                        <p>- Con Gà Con cũng là tổ chức sát thủ à?</p>
                        <p>- Ừ, và chúng là một tổ chức sát thủ cỡ nhỏ.</p>
                        <p>- Chúng mày đến giết tao trả thù cho Anthony?</p>
                        <p>- Không. Chúng tao muốn mượn mày để hạ nhóm Con Gà Con.</p>
                        <p>Tài ngước mắt lên nhìn gã, tự hỏi có phải dân da đen đều là những thằng ngu không.</p>
                        <p>Dùng một thằng bé mười sáu tuổi đối đầu với một tổ chức sát thủ cỡ nhỏ. Ngay cả kiến thật cũng không thể ngu như vậy được.</p>
                        <p>- Tao hiểu mày đang nghĩ gì, nhưng vấn đề phức tạp hơn mày tưởng. Mày bắt buộc phải thực hiện điều mà bọn tao yêu cầu mày, nếu không mày sẽ chết.</p>
                        <p>Tài thận trọng đáp:</p>
                        <p>- Tao sẵn sàng hợp tác, nhưng tao không nghĩ là tao làm được.</p>
                        <p>- Bọn tao nắm mày khá rõ. Tháng vừa rồi mày giết bao nhiêu người?</p>
                        <p>- Hai người.</p>
                        <p>Gã da đen cười khẩy:</p>
                        <p>- Ngay câu đầu đã định lừa tao. Tháng vừa rồi mày đã giết mười người. Mày giết người như ngóe vậy. Với tốc độ này mày sẽ làm giảm dân số của cả cái khu này trước khi mày bước vào tuổi hai mươi. Chúng tao biết mày là một sát thủ bẩm sinh. Sát thủ là một nghề đòi hỏi các kỹ năng đặc biệt, nhưng không phải ai cũng dạy được, trong nghề này cũng có các thiên tài và các công nhân. Mày là thiên tài hiếm có. Chúng tao cần mày để thực hiện một cú lột xác. 𝘛hử đọc 𝒕𝘳uyện không quảng cáo 𝒕ại ﹢ 𝘛 RuM𝘛RU𝓨𝔢𝘕.vn ﹢</p>
                        <p>- Nếu tao làm việc cho bọn mày, bọn mày sẽ thả em tao ra chứ?</p>
                        <p>- Chuyện đó tao không tự quyết được, nhưng nếu mày thể hiện xuất sắc thì có khả năng người đứng đằng sau tao sẽ ban thưởng bằng cách cho anh em mày gặp nhau.</p>
                        <p>- Người đứng đằng sau mày là ai?</p>
                        <p>- Quy tắc đầu tiên: Đừng hỏi những câu ngớ ngẩn.</p>
                        <p>Gã da đen dùng dao cắt dây thừng, dây thừng vừa nói lỏng, Tài đã chồm dậy, kề sát dao vào cổ gã.</p>
                        <p>- Nếu em tao có chuyện gì, người đầu tiên tao cắt cổ là mày.</p>
                        <p>- Được rồi, hạ dao xuống đi.</p>
                        <p>Tài hạ dao xuống.</p>
                        <p>- Tao tên là Martin. Mày cứ gọi tao là Martin Mac. Tao sẽ giải thích cho mày biết nhiệm vụ của mày là gì. Mày sẽ phải giết một thằng da đen tên là Samuel. Gã là sát thủ số một của nhóm Con Gà Con. Đây là ảnh của gã.</p>
                        <p>Martin Mac đặt một bức ảnh lên bàn.</p>
                        <p>- Samuel là nỗi kinh hoàng của bọn tao. Mình nó đã giết năm người bên tao và khiến nhóm của tao gần như bị xóa sổ. Nói cho mày nghe, tao không biết sinh hoạt của nó, cũng không biết thói quen của nó, cũng không biết lịch trình của nó, cũng không biết nhà của nó. Tất cả những gì tao có là tấm ảnh này. Mày làm gì thì tùy. Sau ba ngày mày không giết được nó thì bọn tao sẽ giết em trai mày.</p>
                        <p>- Mày giết em tao, tao giết mày.</p>
                        <p>- Tốt thôi, đằng nào bọn tao cũng sẽ bị bọn Con Gà Con thanh trừng, chết vào tay ai cũng vậy thôi. Mày thực hiện thành công vụ này, tất cả chúng ta đều được lợi. Mày đã giết Anthony, trước sau bọn chúng cũng sẽ tìm đến mày trả thù. Giờ đây chính bọn tao lại là người che chở cho mày, đứng bên cạnh mày chống lại nhóm Con Gà Con. Chúng ta hiện là đồng đội, anh bạn.</p>',
            '<p>“Cậu biết à?” Vừa hô lên, lòng Triệu Triệt bỗng lạnh lẽo hẳn. Anh ta nhìn quanh, phát hiện không ai nghe thấy mới chạy đến bên Tề Hoan hỏi: “Sao cậu biết? Hung thủ là ai?”</p>
                        <p>“Đợi đi.” Tề Hoan chợt nở nụ cười khiêm tốn: “Hung thủ sẽ giết người tiếp thôi.”</p>
                        <p>Hai người bước ra khỏi sân, vòng về chỗ phía Tây gần cổng làng. Ngọn núi xanh thẳm đã gần ngay trước mắt, khi không có ánh dương, khung cảnh tối mù ở nơi này thật sự khiến người ta sợ hãi.</p>
                        <p>“Chúng ta đứng đây có ổn không?” Triệu Triệt theo sát Tề Hoan. Thú thực, anh ta hơi sợ, trải qua một ngày bị tra tấn tâm lý đã làm anh ta phát hoảng, thần hồn nát thần tính. Anh ta không khỏi đến gần Tề Hoan hơn.</p>
                        <p>Tề Hoan cúi đầu nhìn đồng hồ: “Còn nửa tiếng nữa mặt trời sẽ xuống núi hoàn toàn. Anh tin tôi không?”</p>
                        <p>Tin ư? Từ này quá nặng nề trong nhiệm vụ, sao Tề Hoan đột nhiên hỏi vậy?</p>
                        <p>Anh ta liếc nhìn nước da trắng lạnh của người đối diện, dưới ánh chiều tà, làn da ửng hồng lên như bị dị ứng. Nuốt nước bọt, Triệu Triệt khẽ vuốt nơi lồng ngực mình, nín thở rồi trầm ngâm hỏi: “Cậu nói cậu biết chuyện gì đang xảy ra và cách rời khỏi nhiệm vụ?”</p>
                        <p>“Tôi biết.” Tề Hoan tiến vào trong núi: “Tôi biết chuyện gì đang xảy ra.”</p>
                        <p>Khi nghe được câu này, thái độ tra hỏi nóng nảy của Triệu Triệt lập tức nguội xuống, anh ta bỗng chốc đứng lại không bước thêm nữa.</p>
                        <p>Tề Hoan thắc mắc: “Sao thế?”</p>
                        <p>Vẻ kinh ngạc trên mặt Triệu Triệt biến thành kinh hãi.</p>
                        <p>Cảm giác lạnh buốt lan từ lòng bàn chân ra toàn thân.</p>
                        <p>Anh ta quá quen với điệu cười đó rồi, đằng sau luôn che giấu âm mưu.</p>
                        <p>Toi rồi.</p>
                        <p>Gã đang nói dối! Gã không phải Tề Hoan!</p>
                        <p>Gã hoàn toàn chẳng biết chuyện gì đang diễn ra. Gã chỉ muốn lừa mình ra ngoài!</p>
                        <p>Là ma quỷ.</p>
                        <p>Tề Hoan xoay người, hai tay buông thõng bên hông, nhìn Triệu Triệt bằng ánh mắt rợn cả tóc gáy. Tròng mắt trắng dã của gã nhanh chóng giãn ra, đồng tử thu nhỏ tựa lỗ kim, như thể một con côn trùng đã bắt được con mồi. Máu tươi từ chân tóc trên trán Tề Hoan chậm rãi chảy xuống má, lăn đến khoé miệng nhưng lại bị lưỡi của gã liếm sạch.</p>
                        <p>Huyết dịch thấm ướt áo sơ mi trắng của Tề Hoan, gã biến thành màu đỏ. Từ đầu đến chân, duy nhất một màu đỏ tươi.</p>
                        <p>Gương mặt Tề Hoan bắt đầu vặn vẹo biến hóa, trên mặt đầy rẫy bào tử lây lan. Da thịt trên mặt gã từ từ rúm ró tan chảy rồi trở thành bộ dạng của Triệu Triệt.</p>
                        <p>Chạy!</p>
                        <p>… Nhất định phải chạy!</p>
                        <p>Cách xa gã ra!</p>
                        <p>Triệu Triệt tức tốc quay đầu, nhưng trước mặt anh ta đâu còn thôn xóm nào nữa, chỉ có mỗi cỏ hoang và cây cối mênh mông bát ngát. Anh ta bị nhốt trong rừng, nhưng rõ ràng anh ta không hề tới chân núi, vậy tại sao anh ta mắc kẹt trong rừng chứ?</p>
                        <p>Tề Hoan chậm rãi tiếp cận Triệu Triệt đang hoảng hốt chạy bừa, dẫu anh ta chạy bao xa, vẫn không tài nào kéo giãn được khoảng cách giữa mình và con quỷ phía sau!</p>
                        <p>Một người một quỷ, như hình với bóng!</p>
                        <p>“… Tại sao lại chạy, chẳng phải mày rất thích tao sao!”</p>
                        <p>“… Đừng chạy mà!”</p>
                        <p>“… Tại sao lại muốn bỏ đi chứ?”</p>
                        <p>Khu rừng hoang bỗng nhiên vang lên tiếng cười xé ruột xé gan, cùng lúc đấy, con quỷ Tề Hoan sau lưng đang cười “hì hì hì”, oán độc nhìn thẳng vào con mồi của mình!</p>
                        <p>Triệu Triệt sợ chết lắm, anh ta mới ba mươi tuổi thôi, còn đang trong thời kỳ sung mãn mà; anh ta vừa mua một căn nhà ba phòng ngủ một phòng khách; anh ta mới vứt bỏ người phụ nữ xấu xa đã lừa dối mình kia! Anh ta không thể chết được. Anh ta tuyệt nhiên không thể chết ở đây! Người đàn ông trung niên chạy hết sức bình sinh, không từ bỏ hy vọng sống sót cho đến giây phút cuối cùng. Tiếng thét và tiếng cười đùa gào thét lướt qua bên tai!</p>
                        <p>m thanh con quỷ đạp lên đám cỏ dại cong vòng nghe rõ mồn một.</p>
                        <p>Anh ta liều mình chạy: “… Cứu tôi với! Cứu tôi! Ai cứu tôi với!”</p>
                        <p>Mắt thấy mặt trời dần xuống núi, ánh tà dương đỏ tươi chỉ còn cách chân trời một bước, mọi thứ sắp chìm vào cát bụi và tối tăm. Triệu Triệt tuyệt vọng nhắm mắt, tựa như một con lợn rừng đang bất chấp lao đầu.</p>
                        <p>“Ở đây! Anh ấy ở đây nè! Triệu Triệt!”</p>
                        <p>Đột nhiên, một giọng nữ trong trẻo quen thuộc vang lên, là Hạ Vãn Vãn!</p>
                        <p>Triệu Triệt nhìn sang hướng phát ra tiếng nói, thấy Hạ Vãn Vãn đang cầm đèn pin đứng dưới ánh sáng, cách anh ta tầm một trăm mét. Lúc cùng đường bí lối thì bạn đồng hành xuất hiện! Anh ta điên cuồng co chân chạy tới chỗ Hạ Vãn Vãn, nhưng con quỷ sau lưng vẫn khoan thai đuổi theo anh ta.</p>
                        <p>“Đằng sau có quỷ! Đằng sau có quỷ đấy!” Triệu Triệt rú lên xé lòng, cổ họng dần nhuốm mùi máu tươi: “Mau giết chết nó, mau giết chết nó đi!”</p>
                        <p>Hạ Vãn Vãn vẫn đứng yên tại chỗ, cười không đáp.</p>
                        <p>Hô hấp bỗng chốc cứng đờ, Triệu Triệt đột nhiên hỏi: “Cô tới cứu tôi! Có phải không!”</p>
                        <p>Hạ Vãn Vãn nóng nảy trả lời: “Tôi tới tìm anh, anh đang rất nguy hiểm, chúng ta mau về thôi!”</p>
                        <p>Triệu Triệt lập tức dừng bước.</p>
                        <p>Quả nhiên!</p>
                        <p>Hạ Vãn Vãn cũng đang nói dối!</p>
                        <p>Khi cô nói chuyện, một mùi máu tươi sền sệt tanh tưởi xộc vào mũi! Triệu Triệt nổi da gà khắp người, bởi anh ta cảm nhận được hơi thở của quỷ trên người Hạ Vãn Vãn.</p>
                        <p>Tình cờ thay, trực giác của anh ta đôi khi có thể phân biệt được liệu người đó có đang nói dối không. Vừa rồi “Tề Hoan” không nói thật, hiện tại “Hạ Vãn Vãn” cũng đang lừa mình!</p>
                        <p>Cảm giác lạnh lẽo cuốn lấy cơ thể!</p>
                        <p>“Cô không phải Hạ Vãn Vãn! Cô không phải!” Triệu Triệt liều mạng chạy qua hướng khác!</p>
                        <p>Trực giác đã cứu mạng anh ta, nó không phải Chúa cứu thế, cũng không phải câu hỏi hai chọn một. Theo lẽ thường, người ta sẽ chạy về phía Hạ Vãn Vãn, rồi chết dưới tay Hạ Vãn Vãn! Đây là một câu hỏi lựa chọn không có đáp án chính xác.</p>
                        <p>Anh ta thành công rồi.</p>
                        <p>Anh ta chạy về hướng ngược lại, trước mắt xuất hiện một thôn </p>',
            '<p>Hạ Vãn Vãn thao thức trở mình không ngủ được, dù đã uống thuốc ngủ nhưng chẳng có tác dụng gì.</p>
                        <p>Trong lòng cô loáng thoáng cảm thấy sắp xảy ra chuyện gì đó.</p>
                        <p>Cô và Lý Hiểu Thanh đưa lưng về phía nhau nằm ngủ.</p>
                        <p>Lý Hiểu Thanh khẽ cựa mình, hình như cũng bị cơn mất ngủ hành hạ.</p>
                        <p>“Chị Hiểu Thanh, chị ngủ chưa ạ? Em không ngủ được.” Hạ Vãn Vãn hỏi khẽ.</p>
                        <p>Bà không quay người lại, giường quá nhỏ, hai người phụ nữ không quen biết nhau mà nằm đối mặt với nhau sẽ rất lúng túng.</p>
                        <p>“Chưa ngủ.” Lý Hiểu Thanh đáp, cổ họng bà như bị thứ nào đấy chặn lại, hơi khô và ngứa ngáy khó chịu, giống hệt nhiều sợi tóc đen dài dày mọc ra từ bắp thịt. Bà không khỏi nghĩ đến da heo chưa được cạo lông sạch sẽ, trong lòng ớn lạnh.</p>
                        <p>Hạ Vãn Vãn thở dài: “Em cũng không ngủ được, xảy ra chuyện thế này thì ai có thể ngủ được chứ. Chị Hiểu Thanh, chị nói xem, liệu chúng ta sống sót được không?”</p>
                        <p>“Được chứ.”</p>
                        <p>“May mà có chị, nếu không buổi tối đầu tiên em không biết phải vượt qua thế nào. Lần đầu gặp, em đã thấy chị rất thân thiết, như dì út của em vậy. Dì út em đẹp lắm, quanh năm đều mặc váy.” Lúc nói chuyện, trong mắt Hạ Vãn Vãn rơm rớm, ánh lệ lặng lẽ làm mờ nhòe tầm nhìn.</p>
                        <p>“Không sao, chị nhìn em sẽ nhớ tới em gái chị hồi nhỏ, cũng là một cô bé dễ thương.” Trong lúc trò chuyện, Lý Hiểu Thanh không kiềm được, phải đưa tay nhéo cổ họng, ho nhẹ.</p>
                        <p>Hạ Vãn Vãn nói: “Em chị…”</p>
                        <p>“Con bé chết rồi, cuối cùng không cần phải hốt hoảng lo sợ nữa.” Lý Hiểu Thanh vẫn chưa vượt qua được nỗi đau mất em gái, nhưng bà sẵn sàng mở lòng với cô bé này.</p>
                        <p>Hai người nói câu được câu chăng, mãi đến khi Lý Hiểu Thanh có vẻ đã thiếp đi.</p>
                        <p>Hạ Vãn Vãn gảy ga giường, nhưng đầu óc lại cực kì tỉnh táo, không hề buồn ngủ. Tuy vậy, cô không dám tiếp tục trở mình, chỉ sợ sẽ đánh thức Lý Hiểu Thanh vất vả lắm mới ngủ được. Cô cứ nằm nghiêng không nhúc nhích.</p>
                        <p>Rõ ràng đang đắp chăn, nhưng sống lưng như có một cơn gió lạnh lẽo thổi tới. Hạ Vãn Vãn bọc kín mình, cuộn tròn người. Tuy nhiên, cô nhận ra nhiệt độ xung quanh mình chợt giảm xuống, cứ như trong bóng tối đang che giấu một đám quỷ.</p>
                        <p>“Chị Hiểu Thanh, chị Hiểu Thanh, dậy đi chị. Chị không thấy lạnh sao?” Hạ Vãn Vãn áy náy hỏi.</p>
                        <p>Lý Hiểu Thanh không phản ứng.</p>
                        <p>Cô xoay người, chợt nhận ra chỗ cạnh giường mình trống không. Cô chưa hề ngủ, nếu Lý Hiểu Thanh ra ngoài thì cô chắc chắn phải nghe thấy chứ! Hạ Vãn Vãn ngồi dậy, bật đèn đầu giường.</p>
                        <p>Ánh đèn vàng chiếu sáng một vùng tròn, dưới ánh đèn, cô mới nhìn rõ Lý Hiểu Thanh không đi đâu cả, bà đang ngồi ở mép giường.</p>
                        <p>“Chị, chị Hiểu Thanh?”</p>
                        <p>Hạ Vãn Vãn cảm thấy tình trạng của Lý Hiểu Thanh rất không đúng, vai bà đang co giật và run rẩy, cúi đầu cứ như đang mày mò thứ gì.</p>
                        <p>“Này? Chị Hiểu Thanh sao rồi ạ?”</p>
                        <p>Hạ Vãn Vãn kề sát vào: “Chị không sao chứ, em có thể ra ngoài gọi người.”</p>
                        <p>“Khửa…”</p>
                        <p>“Khửa…”</p>
                        <p>“Khửa…”</p>
                        <p>Trong cổ họng Lý Hiểu Thanh thốt ra âm thanh bị tắc nghẽn.</p>
                        <p>Tay phải đập lên vai Lý Hiểu Thanh, bấy giờ Hạ Vãn Vãn mới phát hiện cơ thể của bà lạnh toát: “Em sẽ gọi người! Có phải chị bị bệnh rồi không!”</p>
                        <p>Giây sau.</p>
                        <p>Lý Hiểu Thanh chậm rãi quay đầu lại, đôi mắt vừa mờ mịt vừa trống rỗng. Bà há hốc miệng, hai tay kéo từng sợi tóc đen xen lẫn máu ra khỏi miệng. Tóc quấn vào mu bàn tay và ngón tay bà, khảm vào da, để lộ ra vết thương nhầy nhụa máu!</p>
                        <p>“Chị Hiểu Thanh!” Hạ Vãn Vãn lập tức hét toáng lên, nhảy dựng khỏi giường: “Chị, chị sao vậy? Có ai không! Xảy ra chuyện rồi! Mau tới đây, có ai không á á á á!”</p>
                        <p>Cô rú lên thảm thiết, nhưng chỉ ngồi co ro trong góc chứ không dám đến gần Lý Hiểu Thanh, e sợ người phụ nữ này sẽ nhảy bổ vào mình!</p>
                        <p>Dường như không cảm nhận được cơn đau, Lý Hiểu Thanh thọc hai tay vào miệng. Khóe miệng nứt ra, từng thớ thịt đỏ như máu hiện rõ, trên môi đã không còn lành lặn nữa!</p>
                        <p>Ngày càng xuất hiện nhiều sợi tóc bị kéo ra khỏi cổ họng, quấn dày đặc quanh lòng bàn tay bà. Những sợi tóc kia vừa đen vừa thô như dây gai, trộn lẫn với mô người còn tươi.</p>
                        <p>Chắc hẳn trong dạ dày bà chứa toàn tóc, dù kéo thế nào cũng không kéo hết. Axit ăn mòn ngón tay bà, lôi cả ra phần thịt kho trong bữa tối vẫn chưa được tiêu hoá hoàn toàn!</p>
                        <p>“Cầu xin mọi người mà á á á! Có ai không! Mạnh Lan! Trương Nhất Trì!”</p>
                        <p>Hạ Vãn Vãn mở cửa sổ ra kêu cứu.</p>
                        <p>Mạnh Lan vừa định ngủ, bỗng nghe thấy âm thanh từ phòng Hạ Vãn Vãn truyền đến, cô mở cửa chạy sang phòng bên cạnh.</p>
                        <p>Phá cửa vào, bật đèn phòng, đúng lúc đối diện với Lý Hiểu Thanh!</p>
                        <p>Ngay sau đấy, bị tiếng hét thảng thốt đánh thức, ba người cũng vội vàng chạy tới và chứng kiến cảnh tượng kinh hãi kia.</p>
                        <p>Trên tay Lý Hiểu Thanh quấn một cuộn tóc như chỉ gai, bà đang không ngừng lôi tóc ra khỏi cổ họng. Cổ họng bật ra âm thanh nôn khan!</p>
                        <p>Lý Hiểu Thanh tựa hồ không thấy họ, cúi đầu đưa tay lấy từng sợi tóc xuống, bà hài lòng ngắm “kiệt tác” của mình. Giây lát sau, bà giật hai tay ra, quấn tóc quanh cổ rồi siết mạnh cổ mình!</p>
                        <p>“Mau, mau cứu người!” Trương Nhất Trì hô to.</p>
                        <p>Mạnh Lan bị Trương Nhất Trì kéo đến trước mặt Lý Hiểu Thanh.</p>
                        <p>… Đến cũng đến rồi! Lên thôi!</p>
                        <p>Cô giật thót, giơ ngón tay kéo tóc trên cổ Lý Hiểu Thanh ra ngoài! Còn Trương Nhất Trì tái mặt tách gỡ từng ngón tay cứng ngắc của Lý Hiểu Thanh.</p>
                        <p>Hai người cố hết sức bình sinh, nhưng Lý Hiểu Thanh vẫn sừng sững bất động, chỉ một mực dùng tóc siết chặt cổ mình!</p>
                        <p>Ngày càng nguy cấp!</p>
                        <p>Bỗng dưng.</p>
                        <p>Lý Hiểu Thanh giãy giụa uốn éo; bà quay người nhìn Hạ Vãn Vãn, trong cổ họng phun ra một búng máu sẫm tanh hôi!</p>
                        <p>Gương mặt Hạ Vãn Vãn nhuộm đầy máu tươi; chiếc váy trắng của cô như bông hoa tươi ma quái đang nở rộ.</p>',


        ];
        $time = now();
        shuffle($noi_dung_mau);

        for ($sach_id = 1; $sach_id <= 66; $sach_id++) {
            $soChuong = rand(15, 25);
            $loai_sua = $faker->randomElement(['Sửa tên chương', 'Sửa nội dung chương']);
            $noi_dung_mau_tam = $noi_dung_mau;

            for ($chuong = 1; $chuong <= $soChuong; $chuong++) {
                $noi_dung = array_shift($noi_dung_mau_tam);

                // Nếu hết phần tử, trộn lại mảng để tái sử dụng
                if (empty($noi_dung_mau_tam)) {
                    $noi_dung_mau_tam = $noi_dung_mau;
                    shuffle($noi_dung_mau_tam);
                }                DB::table('chuongs')->insert([
                    'sach_id' => $sach_id,
                    'tieu_de' => $faker->randomElement($tieu_de_viet),
                    'noi_dung' =>  $noi_dung,
                        'so_chuong' => 'Chương '. $chuong,
                    'ngay_len_song' => $faker->date(),
//                    'trang_thai' => $faker->randomElement(['an', 'hien']),
//                    'kiem_duyet' => $faker->randomElement(['cho_xac_nhan', 'tu_choi', 'duyet', 'ban_nhap']),
                    'trang_thai' => 'hien',
                    'kiem_duyet' => 'duyet',
                    'loai_sua' => $loai_sua,
                    'created_at' => $time->copy()->addMinutes($chuong * 2),
                    'updated_at' => $time->copy()->addMinutes($chuong * 2)->addMinutes(4),
                ]);
            }
        }
    }

}
