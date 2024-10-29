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

$(document).ready(function () {
    $('.preBtn').click(function () {
        const section = $(this).data('section');
        const container = $(`.book-container[data-section="${section}"]`);

        if (!container.length) return;

        const bookWidth = container.find('.book').outerWidth(true);
        const containerWidth = container.width();
        const totalBooks = container.find('.book').length;
        const totalWidth = totalBooks * bookWidth;

        let currentPosition = container.data('currentPosition') || 0;
        const maxScroll = totalWidth - containerWidth;

        currentPosition += containerWidth;
        if (currentPosition > maxScroll) {
            currentPosition = 0;
        }

        container.css('transform', 'translateX(-' + currentPosition + 'px)');
        container.data('currentPosition', currentPosition);
    });

    $('.nextBtn').click(function () {
        const section = $(this).data('section');
        const container = $(`.book-container[data-section="${section}"]`);

        if (!container.length) return;

        const bookWidth = container.find('.book').outerWidth(true);
        const containerWidth = container.width();
        const totalBooks = container.find('.book').length;
        const totalWidth = totalBooks * bookWidth;

        let currentPosition = container.data('currentPosition') || 0;
        const maxScroll = totalWidth - containerWidth;

        currentPosition -= containerWidth;
        if (currentPosition < 0) {
            currentPosition = maxScroll;
        }

        container.css('transform', 'translateX(-' + currentPosition + 'px)');
        container.data('currentPosition', currentPosition);
    });
});