// jquery
jQuery(document).ready(function(){

    var element = document.getElementById('truyen_tabs');
    var position = element.getBoundingClientRect();
 
    $('body').on('click', '.read-more', function(event) {
        event.preventDefault();
        $('.keywords').removeClass('crop-text-1')
        $('.excerpt-collapse').addClass('hidden')
        $('.excerpt-full').removeClass('hidden')
        $(".read-more span").html('<i class="fa fa-angle-double-left" aria-hidden="true"></i> Rút Gọn');
        $(this).addClass('read-less')
        $(this).removeClass('read-more')
    });

 
    $('body').on('click', '.read-less', function(event) {
        event.preventDefault();
        $('.keywords').addClass('crop-text-1')
        $('.excerpt-collapse').removeClass('hidden')
        $('.excerpt-full').addClass('hidden')
        $(".read-less span").html('Xem Thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i>');            
        $(this).addClass('read-more')
        $(this).removeClass('read-less')
        window.scrollTo(position.left, position.top);

    });


	var language = $('#language').data('language');

	if (language == 'en') {
		var text0 = 'Continue';
		var text1 = 'Follow';
		var text3 = 'Load More Comments';
		var text4 = 'Thank you for rating!';
	} else if (language == 'id') {
		var text0 = 'Continue';
		var text1 = 'Mengikuti';
		var text3 = 'Muat Lebih Banyak Komentar';
		var text4 = 'Terima kasih atas penilaiannya!';
	} else {
		var text0 = 'Đọc tiếp';
		var text1 = 'Theo Dõi';
		var text3 = 'Xem Thêm Bình Luận';
		var text4 = 'Cảm ơn bạn đã đánh giá!';
	}


	// Start ---- Button Đọc tiếp
	var last_seen = localStorage.getItem("last_seen");
	if (last_seen == null) {
		var last_seen = {}
	} else {
		last_seen = jQuery.parseJSON(last_seen);
	}
	var slug = $('#views').data("slug");
	var id = $('#views').data("id");
	var title = $('#views').data("title");
	var chap = $('#views').data("chap");
	if (chap != undefined && chap != 1) {
		delete last_seen['_'+id];					
		last_seen['_'+id] = {
			'url'	: slug,
			'name'	: title,
			'chap'	: chap+ '/#reading',
		}
		localStorage.last_seen = JSON.stringify(last_seen);
	}
	if ('_'+id in last_seen){
	    $('#button_reading').html('<a href="/truyen/'+last_seen['_'+id]['url']+'/'+last_seen['_'+id]['chap']+'" class="btn btn-md color-white btn-primary"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i> '+text0+'</a>')
	}
	// End ---- Button Đọc tiếp


	var exist_cookie_rating = Cookies.get('rating_'+id);

	// trên di động không cần hover
	//phải sử dụng on
	$( document ).ajaxComplete(function() {
		if (exist_cookie_rating) {
			$( "#rate" ).append( '<style type="text/css">.rating div.active:after {background: -webkit-linear-gradient(145deg,#1ebbf0 40%,#39dfaa 60%);color: transparent;-webkit-background-clip: text;text-decoration: none;}.rating div.half_active:after {background: -webkit-linear-gradient(145deg,#d2d2d2 40%,#39dfaa 60%);color: transparent;-webkit-background-clip: text;text-decoration: none;}</style>' );
		}
		$('#rate .rating div').hover(function() {
			/* Stuff to do when the mouse enters the element */
    		var ratingtext = $(this).data("ratingtext");
			$('#rate .rate-hover').html(ratingtext);

			if (exist_cookie_rating) {
			    $('#rate .rating div').click(false);
				$('#rate .rating div').css('pointer-events', 'none');
			} 
			var rating_block = $('.rating').data("block");
			if (rating_block == "block") {
			    $('#rate .rating div').click(false);
				$('#rate .rating div').css('pointer-events', 'none');			    				
			}

			$(this).click(function(event) {
				/* Act on the event */
				//event.preventDefault();
				//event.stopPropagation();
				event.stopImmediatePropagation();

				if (exist_cookie_rating) {
				} else {

					$('#rate .rating div').css('pointer-events', 'none');

					//alert('Cảm ơn bạn đã đánh giá!');
		    		var ratingvalue = $(this).data("ratingvalue");		    		
		    		var post_name = $('#views').data("slug");		    		
					$.ajax({ 
						type : "post",
						dataType : "html",
						url : ajaxurl,
						data : {
							action: "rating",
							id: id,
							post_name: post_name,
							ratingvalue: ratingvalue,
							exist_cookie_rating: exist_cookie_rating,
						},
						beforeSend: function(){
							$('#rate .rate-noti').html(text4);
						},
						success: function(response) {
							$('#rate').html(response);
						},
						error: function( jqXHR, textStatus, errorThrown ){
							console.log( 'The following error occured: ' + textStatus, errorThrown );
						}
					});
					Cookies.set('rating_'+id, ratingvalue, { expires: 365, path: '', sameSite: 'lax' });
				}


			});
		
		}, function() {
			/* Stuff to do when the mouse leaves the element */
			$('#rate .rate-hover').html('');								        						
		});
	});


	// View 
	$.ajax({
		type : "post",
		dataType : "html",
		url : ajaxurl,
		data : {
			action: "views",
			id: id,
			slug: slug,
		},
       success: function(response) {
       		$("body").append(response)
            var after_ajax_view = $('#after-ajax-view').data('id');
            var number_follow = $('#after-ajax-view').data('number');
            if (after_ajax_view == "follow") {
            	$("#button_follow a").html('<span class="btn btn-md btn-warning"><i class="fa fa-bell-slash" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg">Xoá Theo Dõi</span> ('+number_follow+')</span>')
            } else if (after_ajax_view == "library") {
            	$("#button_follow a").html('<span class="btn btn-md btn-danger"><i class="fa fa-database" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg">Xoá Tủ Truyện</span> ('+number_follow+')</span>')				
            }
       },		
	});

    $('.pagination-child, #truyen_dsc').click(function(){ 
        $.ajax({ 
           type : "post",
           dataType : "html",
           url : ajaxurl,
           data : {
                action: "all_chap",
                id: id,
           },
           beforeSend: function(){
                $('#all_chap .row').html('<div class="col-xs-12"><div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> Đang tải, vui lòng đợi giây lát</div></div>')
           },
           success: function(response) {
                $('#all_chap .row').html(response);
           },
           error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
           }
       });
    });

	var sort_click = 0;
	$("#sort").click(function(event) {
		sort_click++;
		event.stopImmediatePropagation();

		var string = $("#all_chap .modal-body .row").html();
		var chap_from_string = string.match(/<div class=".*?">.*?<\/div>/g);
		var sort = $(this).html();
		chap_from_string.reverse(); 
		$("#all_chap .modal-body .row").html(chap_from_string);

		if (sort_click % 2 == 0) {
			$("#sort").html('<i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>');

		} else {
			$("#sort").html('<i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>');

		}

		
	});
	


    $('#slider-premiumItem-img').slick({

        responsive: [
        {
            breakpoint: 2920,
            settings: "unslick"
        },            
        {
            breakpoint: 992,
            settings: {

              dots: true,
              infinite: false,
              speed: 300,
              slidesToShow: 6,
              slidesToScroll: 6,
              prevArrow: '<span class="slick-prev slick-arrow"><span class="fa fa-angle-left"></span></span>',
              nextArrow: '<span class="slick-next slick-arrow"><span class="fa fa-angle-right"></span></span>',

            }
        },
        {
            breakpoint: 480,
            settings: {
              dots: true,
              infinite: false,
              speed: 300,
              slidesToShow: 4,
              slidesToScroll: 4,
              prevArrow: '<span class="slick-prev slick-arrow"><span class="fa fa-angle-left"></span></span>',
              nextArrow: '<span class="slick-next slick-arrow"><span class="fa fa-angle-right"></span></span>',

            }
        },
        {
            breakpoint: 375,
            settings: {
              dots: true,
              infinite: false,
              speed: 300,
              slidesToShow: 3,
              slidesToScroll: 3,
              prevArrow: '<span class="slick-prev slick-arrow"><span class="fa fa-angle-left"></span></span>',
              nextArrow: '<span class="slick-next slick-arrow"><span class="fa fa-angle-right"></span></span>',

            }
        }


        ]            
    }); 



	$('#pagination').on('click', 'ul.pagination li', function(event) {
		event.preventDefault();

		var page = $(this).data('id');
		if (!page) {return}

		var type = $("#pagination").data('type')
		console.log(page);

		$.ajax({ 
			type : "post", 
			dataType : "html", 
			url : ajaxurl, 
			data : {
				action: "user_truyen_pagination", 
				page: page, 
				type: type, 
				id: id,
				slug: slug,
			},
			beforeSend: function(){
				//$('#sua_truyen').html('');
				$('.pagination').html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');

			},
			success: function(response){
				$('#pagination').html(response)

                $('html, body').animate({
                    scrollTop: $("#pagination").offset().top
                }, 200);

			},

		});	

	});


});	