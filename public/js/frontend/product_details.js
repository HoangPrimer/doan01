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

$(document).on('click', '.imgThum', imgThum);

function imgThum() {
    let src = $(this).attr('src');
    $('.img_parent').attr('src', src);
}

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
                    alert('Vui lòng đăng nhập để bình luận');
                }
                if (data.code === 400) {
                    $('.ers').html(data.text);
                }

            },
            error: function() {

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
                alert('Cảm ơn Bạn đã dánh giá sản phẩm!!!')
            }
            if (data.code === 300) {
                alert('Bạn đã đánh giá sản phẩm này rồi!!!');
            }
            if (data.code === 400) {
                alert('Vui lòng đăng nhập để đánh giá');
            }
            if (data.err = 'err') {
                $('.error_star').html(data.star);
                $('.error_text').html(data.text);
            }

        },
        error: function() {

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
        error: function() {},
    });
});