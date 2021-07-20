$(document).on('click', '.change_thumb', change_thumb);

function change_thumb() {
    let src = $(this).attr('src');
    $('.img_parent').attr('src', src);
}



$(document).on('click', '.change__register', change__register);

function change__register(event) {
    event.preventDefault();
    if ($('.signinBx').hasClass('top') === false) {
        $('.signinBx').addClass('top');
        $('.signinBx').removeClass('top1');
        if ($('.registerBx').hasClass('bot') === false) {
            $('.registerBx').addClass('bot');
            $('.registerBx').removeClass('bot1');
        }
    }
}
$(document).on('click', '.change__login', change__login);

function change__login(event) {
    event.preventDefault();
    if ($('.registerBx').hasClass('bot') === true) {
        $('.registerBx').addClass('bot1');
        $('.registerBx').removeClass('bot');
        if ($('.signinBx').hasClass('top') === true) {
            $('.signinBx').addClass('top1');
            $('.signinBx').removeClass('top');
        }
    }
}




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
                    $('.abc').html(data.viewcomment);
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
                $('.product__details--info').html(data.viewcenter);
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









$(document).on('submit', '#form_upload', changeinfoooooooo);

function changeinfoooooooo(event) {
    event.preventDefault();
    let url = $(this).data('url');

    $.ajax({
        url: url,
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.code === 200) {
                $('.er_avatar').html(data.avatar);
                $('.er_name').html(data.name);
                $('.er_phone').html(data.phone);
                $('.er_email').html(data.email);
                $('.er_address').html(data.address);
                $('.er_gender').html(data.gender);
            }
            if (data.code === 300) {
                $('.info__profile').html(data.render);
                $('.header__profile').html(data.heder);
                alert('Cập nhật thành công');
            }
        },
    });
}

$(document).on('submit', '#form_register', form_register);

function form_register(event) {
    event.preventDefault();
    let url = $(this).data('url');

    $.ajax({
        url: url,
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.code === 200) {
                $('.err__name').html(data.name);
                $('.err__email').html(data.email);
                $('.err__password').html(data.password);
                $('.err__repassword').html(data.repassword);
            }
            if (data.code === 300) {
                alert('Đăng ký thành công!');
                $('.login__register').html(data.render);
            }
        },
    });
}



$(document).on('click', '.update', update);
$(document).on('click', '.huy', back);

function update() {
    if ($('#a2').hasClass('right__anime') === false) {
        $('#a2').addClass('right__anime');
        $('#a2').removeClass('right__anime1');
    }
}

function back() {
    if ($('#a2').hasClass('right__anime') === true) {
        $('#a2').addClass('right__anime1');
        $('#a2').removeClass('right__anime');
    }
}