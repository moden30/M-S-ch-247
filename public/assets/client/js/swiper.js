const swiper = new Swiper("#swiper-home", {
    loop: true,
    autoHeight: true,
    effect: "fade",
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
swiper.on('slideChange', function () {
    var element = $('.slide-img');
    element.removeClass('vanishIn');
    void element[0].offsetWidth;
    element.addClass('vanishIn');
});


const swiper2 = new Swiper(".swiper-updated", {
    spaceBetween: 8,
    slidesPerView: 7,
    freeMode: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    breakpoints: {
        1: {
            slidesPerView: 2,
            spaceBetween: 2,
        },
        320: {
            slidesPerView: 3,
        },
        480: {
            slidesPerView: 4,
        },
        640: {
            slidesPerView: 5,
            spaceBetween: 10,
        },
        1300: {
            slidesPerView: 7,
        },
    },
});

const swiper3 = new Swiper("#swiper-recommended", {
    spaceBetween: 30,
    slidesPerView: 3,
    freeMode: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        1: {
            slidesPerView: 1,
        },
        480: {
            slidesPerView: 2,
        },
        640: {
            slidesPerView: 3,
        },
    },
});

const swiper4 = new Swiper("#swiper-random", {
    spaceBetween: 30,
    slidesPerView: 1,
    freeMode: true,
    loop: true,
    direction: 'vertical',
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

$('#random-btn').click(function () {
    $.ajax({
        url: "/api/random-comic",
        type: 'GET',
        success: function (response) {
            const container = $('.container-random');
            container.empty();
            let html = "";
            response.forEach(element => {
                html += `
                    <div class="swiper-slide flex h-full w-full items-center cursor-pointer">
                        <div class="flex h-full w-full items-center">
                            <div class="flex h-3/4 w-[60%] flex-col space-y-2 px-4 md:space-y-4 md:py-6">
                                <h1 class="my-2 min-h-max font-secondary text-3xl line-clamp-1 md:text-4xl lg:text-5xl">
                                    ${element.name || ''}
                                </h1>
                                <h2 class="text-xl line-clamp-3 md:text-2xl md:line-clamp-4">
                                    ${element.content || ''}
                                </h2>
                                <div class="flex w-full flex-1 items-center space-x-4 text-sm md:text-2xl">
                                    <a href="/${element.slug || ''}">
                                        <button class="h-fit rounded-xl bg-white p-4 text-gray-800 transition-all duration-200 hover:scale-110">
                                            Chi tiết
                                        </button>
                                    </a>
                                    ${element.chapter ? `
                                        <a href="/${element.slug || ''}/${element.chapter.slug || ''}" class="h-fit rounded-xl bg-primary p-4 transition-all duration-200 hover:scale-110">
                                            Đọc ngay
                                        </a>
                                    ` : ''}
                                </div>
                            </div>
                            <div class="flex h-full w-3/4 items-center justify-end overflow-hidden md:w-[60%] md:justify-center lg:w-[40%]">
                                <figure class="relative h-[200%] w-[80%] rotate-[15deg] border-4 border-white md:w-[70%] md:rotate-[18deg] lg:w-[60%] lg:rotate-[25deg]">
                                    <img class="absolute inset-0 object-cover object-center w-full h-full"
                                        src="${element.thumbnail || ''}" alt="comic-img"/>
                                </figure>
                            </div>
                        </div>
                    </div>
                `;
            });
            container.append(html);
            swiper4.update();
        }
    });
});
