$(document).on('click', '.show_rate',
    function show_rate() {

        let play = $('.form_rate').css('display');
        if (play === 'none') {
            $('.form_rate').css('display', 'block');
        } else {
            $('.form_rate').css('display', 'none');
        }
    }
);

/////////////////////////////

$(document).on('click', '.imgThum', function imgThum() {
    let src = $(this).attr('src');
    $('.img_parent').attr('src', src);
    let abc = $('.imgThum');

    for (let i = 0; i < abc.length; i++) {
        $(abc[i]).css({ 'border': '1px solid #ccc', 'padding': '0' });
    }
    $(this).css({
        'border': '1px solid #4524ff',
        'padding': '2px'
    });
});

/////////////////////////////////

$(document).on('click', '.add_comment',
    function add_comment(event) {
        event.preventDefault();

        let urlComment = $(this).data('url');
        let id = $(this).parents('form.form_comment').find('input').val();
        let content = $(this).parents('form').find('textarea').val().trim();

        $.ajax({
            url: urlComment,
            dataType: 'json',
            data: { id: id, text: content },
            success: function(data) {
                if (data.code === 200) {
                    $('.comment').html(data.viewcomment);
                }
                if (data.code === 300) {
                    Command: toastr["warning"]("Vui lòng đăng nhập để bình luận.")
                    toastr.options = {
                        "newestOnTop": true,
                        "positionClass": "toast-top-right",
                        "showDuration": "300",
                        "hideDuration": "1000",
                    }
                }
                if (data.code === 400) {
                    $('.ers').html(data.text);
                }
            },
        });
    }
);

/////////////////////////////////////////


$(document).on('click', '.add_rate', function add_rate(event) {
    event.preventDefault();

    let urlRate = $(this).data('url');
    let id = $(this).parents('form.form_rate').find('input.id_rate').val();
    let star = $(this).parents('form.form_rate').find("input[type='radio']:checked").val();
    let content = $(this).parents('form').find('textarea').val().trim();
    $.ajax({
        url: urlRate,
        dataType: 'json',
        data: { id: id, text: content, star: star },
        success: function(data) {
            if (data.code === 200) {
                $('.rating').html(data.viewrate);
                $('.product-info').html(data.viewcenter);
                Command: toastr["success"]("Cảm ơn bạn đã đánh giá!!!")
                toastr.options = {
                    "newestOnTop": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                }
            }
            if (data.code === 300) {
                Command: toastr["error"]("Bạn đã đánh giá rồi!!!")
                toastr.options = {
                    "newestOnTop": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                }
            }
            if (data.code === 400) {
                Command: toastr["warning"]("Vui lòng đăng nhập để đánh giá.")
                toastr.options = {
                    "newestOnTop": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                }
            }
            if (data.err = 'err') {
                $('.error_star').html(data.star);
                $('.error_text').html(data.text);
            }
        },
    });
});

/////////////////////////////////////

$(document).on('click', '.buy-now', function buy_now(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');
    let url_shoppingCart = $('.url_cart').data('url');
    $.ajax({
        url: urlCart,
        dataType: 'json',
        success: function(data) {
            $(location).attr('href', url_shoppingCart);
            $('#header').html(data.header);
        },
    });
});



//            doc them nut 

$(document).on('click', '.read_more', function read_more() {
    $('.product-desc').css('height', 'auto');
    $('.hide-more').removeClass('d-none');
    $(this).addClass('d-none');

});
$(document).on('click', '.hide-more', function hide_more() {
    $('.product-desc').css('height', '500px');
    $('.read_more').removeClass('d-none');
    $(this).addClass('d-none');
});