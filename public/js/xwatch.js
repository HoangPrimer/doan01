function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');

            }
        }
    }
}


function changeadd(type, element) {
    let tabs = document.getElementsByClassName('tab-links');
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.background = "black";
    }

    element.style.background = "#3a3e44";
    document.getElementById(type).style.display = "flex";
    switch (type) {
        case 'region1':
            document.getElementById('region2').style.display = "none";
            break;
        case 'region2':
            document.getElementById('region1').style.display = "none";
            break;
    }
}


function change__product(type, element) {
    let tabs = document.getElementsByClassName('item_btn');
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.background = "rgb(71, 241, 241)";
        tabs[i].style.color = "#000";
    }

    element.style.background = "rgb(79, 179, 236)";
    element.style.color = "#fff";
    document.getElementById(type).style.display = "flex";
    switch (type) {
        case 'nam':
            document.getElementById('nu').style.display = "none";
            break;
        case 'nu':
            document.getElementById('nam').style.display = "none";
            break;
    }
}

$(document).on('click', '.change_thumb', change_thumb);

function change_thumb() {
    let src = $(this).attr('src');
    $('.img_parent').attr('src', src);
}


setTimeout(function() {
    $('#toast').remove();
}, 3000);

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

function addTocart(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');

    $.ajax({

        url: urlCart,
        dataType: 'json',
        success: function(data) {
            if (data.code === 200) {
                alert('Đã thêm vào giỏ hàng');
                $('.header__cart').html(data.headers);
            }
        },
        error: function() {

        },
    });
}

$(function() {
    $(document).on('click', '.shopping', addTocart);
});


function updatecart(event) {
    event.preventDefault();

    let urlUpdate = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let soluong = $(this).parents('tr').find('input.soluong').val();

    $.ajax({

        url: urlUpdate,
        dataType: 'json',
        data: { id: id, soluong: soluong },
        success: function(data) {
            if (data.code === 200) {

                $('.shopping_cart').html(data.cart_component);
                alert('Cập Nhật Thành Công');
            }
        },
        error: function() {

        },
    });
}

$(document).on('click', '.cart_update', updatecart);
$(document).on('click', '.del_cart', delcart);
$(document).on('click', '.show_rate', show_rate);
$(document).on('click', '.add_comment', add_comment);
$(document).on('click', '.add_rate', add_rate);



function add_rate(event) {
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
}

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




function delcart(event) {
    event.preventDefault();

    let urlDel = $('.shopping_cart').data('url');
    let id = $(this).data('id');


    $.ajax({
        url: urlDel,
        dataType: 'json',
        data: { id: id },
        success: function(data) {
            if (data.code === 200) {

                $('.shopping_cart').html(data.cart_component);
                $('.header__cart').html(data.header);
                alert('Đã Xóa');
            }
        },
        error: function() {

        },
    });
}

function show_rate() {

    let play = $('.form_rate').css('display');
    if (play === 'none') {
        $('.form_rate').css('display', 'block');
    } else {
        $('.form_rate').css('display', 'none');
    }


}

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

$(document).on('submit', '#form_oder', form_oder);

function form_oder(event) {
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
                $('.err_name').html(data.name);
                $('.err_email').html(data.email);
                $('.err_phone').html(data.phone);
                $('.err_payment').html(data.payment);
                $('.err_gender').html(data.gender);
                $('.err_address').html(data.address);
            }
            if (data.code === 300) {
                alert(data.message);
                $('.shopping_cart').html(data.shopcart);
                $('.header__cart').html(data.headers);
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