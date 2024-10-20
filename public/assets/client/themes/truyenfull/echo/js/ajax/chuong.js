var last_seen = localStorage.getItem("last_seen");
if (last_seen == null) {
    var last_seen = {}
} else {
    last_seen = jQuery.parseJSON(last_seen);
}
var id = $('#views').data("id");
var chap = $('#views').data("chap");
var slug = $('#views').data("slug");
var title = $('#views').data("title");
var gold = $('#views').data("gold");
var chapid = $('#views').data("chapid");
var date = $('#views').data("date");
var status = $('#views').data("status");

delete last_seen['_'+id];
//last_seen['_'+id] = slug + '/chap/' + chap;

last_seen['_'+id] = {
    'url'	: slug,
    'name'	: title,
    'chap'	: 'chap/' + chap,
}

localStorage.last_seen = JSON.stringify(last_seen);


var setting_chap = localStorage.getItem("setting_chap");
if (setting_chap == null) {
    var setting_chap = {}
} else {
    setting_chap = jQuery.parseJSON(setting_chap);

    if (setting_chap['font-size'] != null) {
        $(".reading").css('font-size', setting_chap['font-size']+'px');
    }
    if (setting_chap['line-height'] != null) {
        $(".reading").css('line-height', setting_chap['line-height']+'%');
    }
    if (setting_chap['font-family'] != null) {
        $(".reading").css('font-family', setting_chap['font-family']);
    }

    if (setting_chap['background'] != null) {
        $("body").css('background', setting_chap['background']);
        if (setting_chap['background'] == '#222') {
            $(".reading").css('color', '#9B9A9A');
            $(".explanation").css({"border":"10px solid "+setting_chap['background'], "color":"#9cb0db"});
            $("h1, h2").css('color', '#1ebbf0a6');
            $(".explanation").append('<style>#success-hidden .explanation::after {color:#1ebbf0a6!important}</style>');
        } else {
            $(".reading").css('color', '#333');
            $(".explanation").css("border","10px solid "+setting_chap['background']);
        }
        $(".explanation").append('<style>.explanation::after{background:'+setting_chap['background']+'!important;}</style>');
    }
}


function isNumeric(str) {
    if (typeof str != "string") return false // we only process strings!
    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
        !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}

$.ajax({
    type : "post",
    dataType : "html",
    url : ajaxurl,
    data : {
        action: "views",
        id: id,
        slug: slug,
        gold: gold,
        chapid: chapid,
        date: date,
        status: status,
    },
    success: function(response) {
        response = response.trim();
        if (response.trim() == "not_published") {
            $(".explanation").html('<div class="alert alert-warning text-center" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i> Truyá»‡n chÆ°a Ä‘Æ°á»£c duyá»‡t, tĂ­nh nÄƒng xem chÆ°Æ¡ng á»Ÿ cháº¿ Ä‘á»™ nĂ y khĂ´ng kháº£ dá»¥ng. Náº¿u báº¡n quáº£n lĂ½ truyá»‡n nĂ y, vui lĂ²ng liĂªn há»‡ BQT Ä‘á»ƒ xĂ©t duyá»‡t.</div>');
            $(".explanation").removeClass('explanation')
        } else if (isNumeric(response)) {
            $(".explanation .e-text-1 strong").html((new Intl.NumberFormat('ja-JP').format(response)) +" VĂ ng");
        }
    },
});


document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
            var href = $('.next-chap-1 a').attr('href');
            if (href) {
                window.location.replace(href);
            }
            break;
        case 39:
            var href = $('.next-chap-2 a').attr('href');
            if (href) {
                window.location.replace(href);
            }
            break;
    }
};



function scrollModel() {
    var interval1 = 0;
    interval1 = setInterval(function() {
        var div = $(".modal-body-dsc .list-group-item-info").offset().top - $(".modal-body-dsc").offset().top
        if (div != 0) {
            $('.modal-dialog-scrollable .modal-body').animate({
                scrollTop: div - $(window).height()/4
            }, 150);
            clearInterval(interval1)
        }
        console.log(div);
    }, 100);
}


let click_mid = 0;
$('.fullchap .full').click(function(event) {
    click_mid++;
    if (click_mid >= 2) {
        $('#modaldsc').modal('show');
        scrollModel()
        return
    }
    $.ajax({
        type : "post",
        dataType : "html",
        url : ajaxurl,
        data : {
            action: "user_chap_full",
            id: id,
            chapid: chapid,
        },
        beforeSend: function(){
            $('.fullchap div span').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
        },
        success: function(response) {
            $('#modaldsc .modal-body-dsc').html(response);
            $('#modaldsc').modal('show');
            $('.fullchap div span').html('<i class="fa fa-list" aria-hidden="true"></i>');
            scrollModel()
        }
    });
});


var sort = "asc"
$('#dsc_asc').click(function(event) {
    $(this).addClass('btn-primary');
    $(this).removeClass('btn-secondary');
    $('#dsc_desc').removeClass('btn-primary');
    $('#dsc_desc').addClass('btn-secondary');
    if (sort != "asc") {
        var list = $('#modaldsc .modal-body-dsc');
        var listItems = list.children('a');
        list.append(listItems.get().reverse());
    }
    $('.modal-dialog-scrollable .modal-body').animate({
        scrollTop: 0
    }, 150);
    sort = "asc"
});


$('#dsc_desc').click(function(event) {
    $(this).addClass('btn-primary');
    $(this).removeClass('btn-secondary');
    $('#dsc_asc').removeClass('btn-primary');
    $('#dsc_asc').addClass('btn-secondary');
    if (sort != "desc") {
        var list = $('#modaldsc .modal-body-dsc');
        var listItems = list.children('a');
        list.append(listItems.get().reverse());
    }
    $('.modal-dialog-scrollable .modal-body').animate({
        scrollTop: 0
    }, 150);
    sort = "desc"
});
