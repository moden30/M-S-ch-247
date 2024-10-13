jQuery(document).ready(function(){

	//$( document ).ajaxComplete(function() { // Phải có ajax hàm này mới hoạt động
	term        = $('h1').data("term");
    slug        = term['slug'];
    name        = term['name'];
    taxonomy    = term['taxonomy'];

    // Start ---- Button Follow
    object_follow_tax = localStorage.getItem('follow_tax');

    if (object_follow_tax == null) {
        var object_follow_tax = {};
    } else {
        object_follow_tax = jQuery.parseJSON(object_follow_tax);
    }
    child_object_follow_tax = object_follow_tax[taxonomy];
    if (child_object_follow_tax == null) {
        child_object_follow_tax = {};
    }

    // 1. Check exists
    if (slug in child_object_follow_tax){
        $('#follow_tax').html('<span class="btn btn-sm color-white btn-r"><i class="fa fa-times" aria-hidden="true"></i> Loại Bỏ</span>')
    }
    // 2. Click - Unclick
    $("#follow_tax").click(function(event) {
        event.stopImmediatePropagation();
        kk_follow = $("#follow_tax").text();
        if (kk_follow == ' Loại Bỏ') {
            delete object_follow_tax[taxonomy][slug];
            localStorage.setItem('follow_tax', JSON.stringify(object_follow_tax))
            $("#follow_tax").html('<span class="btn btn-sm color-primary border-primary"><i class="fa fa-plus-square color-primary" aria-hidden="true"></i> BookMark</span>');
        } else {
            child_object_follow_tax[slug] = name;
            object_follow_tax[taxonomy] = child_object_follow_tax;
            localStorage.setItem('follow_tax', JSON.stringify(object_follow_tax))
            $("#follow_tax").html('<span class="btn btn-sm color-white btn-r"><i class="fa fa-times" aria-hidden="true"></i> Loại Bỏ</span>');
        }

    }); 
   


	$('#filter-keyword').on("click", '#slider-keyword span.add' , function() {
	// không có event ở function
		
		var keyword_slug = $(this).data("keywordslug");
		var keyword_name = $(this).data("keywordname");
        var option_keyword_tax = $('#filter_keyword_tax option:selected').val();

		// click lần 1 tạo keywordcheck, click lần 2 mới có sẵn
		if (($("#keywordcheck").length > 0)){
			var keyword_check = $('#keywordcheck').data("keywordcheck");
			// click lần 1, sẽ tạo đồng thời remove keyword
			// sử dụng if else click?
		} else {
			var keyword_check = '';
		}

    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "filter_keyword",
    			keyword_slug: keyword_slug,
    			keyword_name: keyword_name,
    			keyword_check: keyword_check,
                option_keyword_tax: option_keyword_tax,
    			term: term,
    		},
    		beforeSend: function(){
    			$('#content-keyword').html('<div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> Đang tải dữ liệu. Vui lòng chờ giây lát.</div>');
    			$('#slider-keyword').html('');
    		},
    		success: function(response) {
    			$('#filter-keyword').html(response);
    		},
    		error: function( jqXHR, textStatus, errorThrown ){
    			console.log( 'The following error occured: ' + textStatus, errorThrown );
    		}
    	});

		current_page_tax = 1;		    	
	});


	$('#filter-keyword').on("click", '#slider-keyword span.remove' , function() {

		var keyword_remove = $(this).data("keywordremove");
		var keyword_check = $('#keywordcheck').data("keywordcheck");
        var option_keyword_tax = $('#filter_keyword_tax option:selected').val();
        
    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "remove_filter_keyword",
    			keyword_remove: keyword_remove,
                keyword_check: keyword_check,
                option_keyword_tax: option_keyword_tax,
    			term: term,
    		},
    		beforeSend: function(){
    			$('#content-keyword').html('<div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> Đang tải dữ liệu. Vui lòng chờ giây lát.</div>');	
    			$('#slider-keyword').html('');		    					    			
    		},
    		success: function(response) {
    			$('#filter-keyword').html(response);
    		},
    		error: function( jqXHR, textStatus, errorThrown ){
    			console.log( 'The following error occured: ' + textStatus, errorThrown );
    		}
    	});
    	// thêm hoặc xóa keyword sau khi ajax phải restart lại biến
		current_page_tax = 1;
	});

	// luôn luôn là page 1
	var current_page_tax = 1;		

	$(document).on("click", '.load_more_tax', function(event) {

		event.stopImmediatePropagation();
		// event.stopPropagation();
		// event.preventDefault ();
		current_page_tax++;
		var max_page_tax = $('.load_more_tax span').data("maxpage");

		if (($("#keywordcheck").length > 0)){
			var keyword_check = $('#keywordcheck').data("keywordcheck");
		} else {
			var keyword_check = '';
		}

		var option_keyword_tax = $('#filter_keyword_tax option:selected').val();

    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "load_more_tax",
    			keyword_check: keyword_check,
    			current_page_tax: current_page_tax,
    			max_page_tax: max_page_tax,	
    			option_keyword_tax: option_keyword_tax,
    			term: term,
    		},
    		beforeSend: function(){
    			//$('#slider-keyword').html('');	
    			$('.load_more_tax').html('');	    					    			
    		},
    		success: function(response) {
    			$('.theloai-thumlist').append(response);	
		    	if  ( max_page_tax <= current_page_tax ) {
    				$('.load_more_tax').remove('')
		    	} else {
		    		$('.load_more_tax').html('<div class="load_more_tax text-center"><span class="btn-primary-border font-12 font-oswald" data-maxpage="'+max_page_tax+'">Xem Thêm Truyện →</span></div>'); 
		    	}

    		},
    		error: function( jqXHR, textStatus, errorThrown ){
    			console.log( 'The following error occured: ' + textStatus, errorThrown );
    		}
    	});

	});



	$(document).on("change", '#filter_keyword_tax', function(event) {

		var option_keyword_tax = this.value;

		if (($("#keywordcheck").length > 0)){
			var keyword_check = $('#keywordcheck').data("keywordcheck");
		} else {
			var keyword_check = '';
		}
    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "filter_keyword_tax",
    			keyword_check: keyword_check,
    			option_keyword_tax: option_keyword_tax,	
    			term: term,
    		},
    		beforeSend: function(){
    			$('#content-keyword').html('');	    					    			
    		},
    		success: function(response) {
    			$('#content-keyword').html(response);	
    		},
    		error: function( jqXHR, textStatus, errorThrown ){
    			console.log( 'The following error occured: ' + textStatus, errorThrown );
    		}
    	});
    	current_page_tax = 1;
	});


    $('#slider-premiumItem-img').slick({

        autoplay: true, 
        autoplaySpeed: 3000,
        infinite: false, // vòng lặp vô hạn
        dots: true,
        prevArrow: '<span class="slick-prev slick-arrow"><span class="fa fa-angle-left"></span></span>',
        nextArrow: '<span class="slick-next slick-arrow"><span class="fa fa-angle-right"></span></span>',
        responsive: [      

            {
                breakpoint: 2920,
                settings: {
                  slidesToShow: 8,
                  slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 1,
                }
            },
            {
                breakpoint: 375,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                }
            }

        ]            
    });  


    $('.sidebar-more').readmore({
        speed: 500,
        collapsedHeight:450,
        collapsedMoreHeight: 1000, // This is your new second height. Always bigger than collapsedHeigh. There isn't any control to that. Be careful.
        moreLink: '<a class="white-shadow" href="#">Xem Thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>',
        evenMoreLink: '<a class="white-shadow" href="#">Xem Thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>', // Add new label
        lessLink: '<a class="readmore_less" href="#">Rút Gọn <i class="fa fa-angle-double-left" aria-hidden="true"></i></a>'
    });


    $('#ajax-topdanhvong').change(function(){
        var type = $(this).val();
        $.ajax({
            type : "post",
            dataType : "html",
            url : ajaxurl,
            data : {
                action: "topdanhvong_tax",
                type: type,
                slug: slug,
                taxonomy: taxonomy,
            },
            beforeSend: function(){
                $('#show-ajax-topdanhvong').html('<div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> Đang tải dữ liệu. Vui lòng chờ giây lát.</div>')
            },
            success: function(response) {
                $('#show-ajax-topdanhvong').html(response)
            },
            error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
        });
    });   



    $('.select-bxh').change(function(){ 
        event.preventDefault()
        event.stopPropagation()
        event.stopImmediatePropagation()        
        var method = $(this).data('id');
        var time = $(this).val();
        var type = $('.nav-tabs.nav-'+method+' .active').data('date');
        $.ajax({ 
           type : "post", 
           dataType : "html", 
           url : ajaxurl, 
           data : {
                action: "tax_bxh_truyen", 
                slug: slug,
                type: type,
                time: time,
                taxonomy: taxonomy,
           },
           beforeSend: function(){
                $('#'+method+'_echo').html('<div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> Đang tải dữ liệu. Vui lòng chờ giây lát.</div>')
           },
           success: function(response) {
                $('#'+method+'_echo').html(response);
           },
       });
    }); 

    $('.nav-tabs li').click(function(event) {
        event.preventDefault()
        event.stopPropagation()
        event.stopImmediatePropagation()    
        let check = $(this).hasClass("active");
        if (check == false) {
            var method = $(this).parent().data('id');  

            $('.nav-tabs.nav-'+method+' li').removeClass('active');
            $(this).addClass("active");

            var type = $(this).data("date");
            var time = $(".select-"+method).val();

            $.ajax({ 
               type : "post", 
               dataType : "html", 
               url : ajaxurl, 
               data : {
                    action: "tax_bxh_truyen", 
                    time: time,
                    type: type,
                    slug: slug,
                    taxonomy: taxonomy,
               },
               beforeSend: function(){
                    $('#'+method+'_echo').html('<div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> Đang tải dữ liệu. Vui lòng chờ giây lát.</div>')
               },
               success: function(response) {
                    $('#'+method+'_echo').html(response);
               },
           }); 
        }
    }); 




});