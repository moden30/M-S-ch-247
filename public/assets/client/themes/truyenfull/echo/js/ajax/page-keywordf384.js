jQuery(document).ready(function(){

	// luôn luôn là page 1
	var current_page_tax = 1;	
	var the_loai = $('h1').data("term");

	$(document).on("click", '.load_more_tax', function(event) {
		event.stopImmediatePropagation();
		// event.stopPropagation();
		// event.preventDefault ();
		current_page_tax++;
		var max_page_tax = $('.load_more_tax span').data("maxpage");
		var option_keyword_tax = $('#filter_keyword_tax option:selected').val();

    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "load_more_page_keyword",
    			the_loai: the_loai,
				current_page_tax: current_page_tax,				
    			option_keyword_tax: option_keyword_tax,
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

		var the_loai = $('h1').data("term");
		var option_keyword_tax = this.value;

    	$.ajax({
    		type : "post",
    		dataType : "html",
    		url : ajaxurl,
    		data : {
    			action: "filter_page_keyword",
    			option_keyword_tax: option_keyword_tax,	
    			the_loai: the_loai,
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


});