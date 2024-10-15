jQuery(document).ready(function($) {

	// Ajax comment
	// để cpage-- phải để var lên trước
	var cpage = $('.load_more_cmt').data("cpage");
	cpage = cpage - 1;

	$('body').on('click', '.load_more_cmt', function(event) {
		event.stopImmediatePropagation();
		cpage++;

		var language = $('#language').data('language');
		if (language == 'en') {
			var text2 = 'Loading... Please wait a moment.';
		} else {
			var text2 = 'Đang tải dữ liệu. Vui lòng chờ giây lát.';
		}

		var post_name = $('#zdata').data('postname');
		var post_type = $('#zdata').data('posttype');

    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "load_more_cmt",
    			post_name: post_name,
    			post_type: post_type,
    			cpage: cpage,
    		},
    		beforeSend: function(){
    			$('.flex-comment').html('') 
    			$('.load_more_cmt_notify').html('<div class="alert alert-info alert-dismissible" role="alert"><span class="fa fa-spinner fa-spin"></span> '+text2+'</div>')
    		},
    		success: function(response) {
    			$('.load_more_cmt_notify').html('')				    			
    			$('#comments').append(response);
    			$('div').removeClass('load_more_cmt_notify');			    			
    		}
    	});
    });


	$('body').on('click', '.addcomment', function(event) {
		event.preventDefault();
		// check user login or an danh
		// hien thi nhap email va ho ten neu an danh
		var user_id = $('#cuser').data('id');
		if (user_id == null) {
			$.ajax({ 
				type : "post", 
				dataType : "html", 
				url : ajaxurl, 
				data : {
					action: "user_comment_check", 
				},
				beforeSend: function(){
					//$('#user_comment').html('');
				},	
				success: function(response){
					$('#show_pre_comment_ajax').html(response);
					var user_id = $('#cuser').data('id');
					if (user_id == '0') {

						var domain = $('#ads-check').data('domain');
						var postname = $('#zdata').data('postname');

						$('#show_after_check_user').html('<div class="alert alert-warning"><i class="fa fa-info" aria-hidden="true"></i> Chú ý: Bạn phải <a href="/user/dang-nhap/?redirect=http://'+domain+'/truyen/'+postname+'"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng Nhập</a> để sử dụng tính năng này.</div>');

						$('#myModal .form-group-ajax').html('');
						
					} else {
						var user_name = $('#cuser').data('name');
						$('#show_after_check_user').html('Xin chào <strong>' +user_name+ '</strong>!' );
					}
				},	
			});	
		}

		var result = {};

		// comment_ID chính là comment_parent
		var comment_ID = $(this).data('id');
		if (comment_ID != undefined) {
			var comment_author = $(this).data('name');
			$('.respond h4').html('<i class="fa fa-reply" aria-hidden="true"></i> Trả Lời @<strong id="gCommentID" data-id="'+comment_ID+'">'+comment_author+'</strong>');
		} else {
			$('.respond h4').html('Comment');
			comment_ID = '0';
		}
		$('#myModal').modal('show');

		// Post comment
		$('body').on('click', '#user_comment', function(event) {
			event.preventDefault();
			event.stopImmediatePropagation();

			content = result['comment_content'] = $('#comment_content').val();

			content = content.trim();

			if (content.length == 0) {
				$('#comment_content').addClass('is-invalid');
				$('#comment_content').removeClass('is-valid');
			} else {
				$('#comment_content').addClass('is-valid');
				$('#comment_content').removeClass('is-invalid');

				// stopImmediatePropagation disable loop
				// create gCommentID because comment_ID not working???
				var gCommentID = $('#gCommentID').data('id');
				if (gCommentID == undefined) {
					gCommentID = '0';
				}
				result['comment_ID'] = gCommentID;

				console.log(gCommentID);
				result['post_name'] = $('#zdata').data('postname');
				result['post_type'] = $('#zdata').data('posttype');
				$.ajax({ 
					type : "post", 
					dataType : "html", 
					url : ajaxurl, 
					data : {
						action: "user_comment", 
						result: result,
					},
					beforeSend: function(){
						$('#user_comment').html('');
						$('#show_user_comment').html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
					},	
					success: function(response){
						//$('#show_user_comment').html(response);
						// nếu user comment lần 2
						// chuyển về notify về myModal2
						var get_info_user = $('#show_after_check_user').html();
						$('#myModal2 .modal-body').html(get_info_user+'<div class="form-group form-group-ajax"><textarea class="form-control is-valid" name="comment" tabindex="4">'+content+'</textarea></div>'+response);
						$('#myModal').modal('hide');
						$('#myModal2').modal('show');
						// và refresh ở myModal1
						$('#show_user_comment').html('');
						$('#myModal textarea ').val('');
						$('#user_comment').html('<span class="btn btn-primary font-12"><i class="fa fa-upload" aria-hidden="true"></i> Gửi Nhận Xét</span>');


						//$('#user_comment').html('<span class="btn btn-primary font-12"><i class="fa fa-upload" aria-hidden="true"></i> Guiwr Nhan xet</span>');
					},	
				});	

			}
						
		});



	});	


});	