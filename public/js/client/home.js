/* for slide */
$(document).ready(function () {
    $('#sliderbanner').slick({
        centerMode: true, // Trung tâm slide hiện tại
        centerPadding: '60px', // Khoảng cách padding để hiển thị một phần của slide tiếp theo
        slidesToShow: 1, // Số slide hiển thị mỗi lần
        arrows: true, // Hiển thị mũi tên điều hướng
        dots: false, // Tắt điểm chấm dưới slider nếu không cần
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '20px',
                    slidesToShow: 1
                }
            }
        ]
    });
});

/* for book slider */
$(document).ready(function () {
    let currentPosition = 0;
    const bookWidth = $('.book').outerWidth();  // Lấy độ rộng của từng cuốn sách bao gồm margin
    const containerWidth = $('.book-container').width();  // Độ rộng của khung hiển thị
    const totalBooks = $('.book').length;  // Tổng số sách
    const totalWidth = totalBooks * bookWidth;  // Tổng chiều rộng của tất cả sách

    $('#nextSachMoiCapNhat').click(function () {
        // Tính toán vị trí tiếp theo
        const maxScroll = totalWidth - containerWidth;
        currentPosition += containerWidth;

        if (currentPosition > maxScroll) {
            currentPosition = 0;  // Nếu đã tới cuối, quay về đầu
        }

        // Dịch chuyển danh sách sách
        $('.book-container.newUpdated').css('transform', 'translateX(-' + currentPosition + 'px)');
    });
});
