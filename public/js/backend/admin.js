// -------------------------------------------------danh sach admin ----------------------------------------------- //


// sắp xếp
$(document).on('change', '.sort_list_admin', function sort_list_admin() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_admin').html(data.new_list_admin);
        },
    });
});

// tìm kiếm
$(document).on('keyup', '#live_search_admin', function live_search_admin() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_admin').html(data.new_list_admin);
        },
    });
});

// xóa 

$(document).on('click', '#delete_admin', function delete_admin(event) {

    let delete_true = confirm('Bạn có muốn xóa hay không??');
    event.preventDefault();
    let url = $(this).data('url');
    if (delete_true == true) {
        $.ajax({
            url: url,
            method: "GET",
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.list_admin').html(data.new_list_admin);
                $('.total_admin').html(data.all);
                alert('Đã Xóa');
            },
        });
    }
});
// -------------------------------------------------- thoong tin ca nhan ------------------------------------------------- //

$(document).on('click', '.update_info', update_info);
$(document).on('click', '.back', back);
$(document).on('click', '.close1', close1);
$(document).on('click', '.close2', close2);
$(document).on('click', '.profile', profile);

function close1() {
    if ($('.form_login_fixed').hasClass('fixed1') === true) {
        $('.form_login_fixed').addClass('fixed2');
        $('.form_login_fixed').removeClass('fixed1');
    }
}

function close2() {
    if ($('.form_login_fixed_2').hasClass('fixed3') === true) {
        $('.form_login_fixed_2').addClass('fixed4');
        $('.form_login_fixed_2').removeClass('fixed3');
    }
}

function profile(event) {
    if ($('.form_login_fixed').hasClass('fixed1') === false) {
        $('.form_login_fixed').addClass('fixed1');
        $('.form_login_fixed').removeClass('fixed2');
        if ($('.form_login_fixed_2').hasClass('fixed3') === true) {
            $('.form_login_fixed_2').addClass('fixed4');
            $('.form_login_fixed_2').removeClass('fixed3');
        }
    } else {
        $('.form_login_fixed').addClass('fixed2');
        $('.form_login_fixed').removeClass('fixed1');
    }
}


function update_info() {
    if ($('.form_login_fixed').hasClass('fixed1') === true) {
        $('.form_login_fixed').addClass('fixed2');
        $('.form_login_fixed').removeClass('fixed1');
        if ($('.form_login_fixed_2').hasClass('fixed3') === false) {
            $('.form_login_fixed_2').addClass('fixed3');
            $('.form_login_fixed_2').removeClass('fixed4');
        }
    }

}

function back() {
    if ($('.form_login_fixed_2').hasClass('fixed3') === true) {
        $('.form_login_fixed_2').addClass('fixed4');
        $('.form_login_fixed_2').removeClass('fixed3');
        if ($('.form_login_fixed').hasClass('fixed2') === true) {
            $('.form_login_fixed').addClass('fixed1');
            $('.form_login_fixed').removeClass('fixed2');
        }
    }
}

$(document).on('click', '.change_profile', change_profile);

function change_profile() {
    let urlProfile = $(this).data('url');
    let id = $(this).data('id');

    let name = $(this).parents('form.form_info').find('input.name').val();
    let em = $(this).parents('form.form_info').find('input.email').val();
    let phone = $(this).parents('form.form_info').find('input.phone').val();
    let gen = $(this).parents('form.form_info').find("input[type='radio']:checked").val();
    let ad = $(this).parents('form.form_info').find('input.address').val();

    $.ajax({
        url: urlProfile,
        dataType: 'json',
        data: {
            id: id,
            name: name,
            email: em,
            phone: phone,
            gender: gen,
            address: ad,
        },
        success: function(data) {
            if (data.code === 200) {

                $('.err_name').html(data.name);
                $('.err_phone').html(data.phone);
                $('.err_gender').html(data.gender);
                $('.err_address').html(data.address);
                $('.err_email').html(data.email);
                $('.err_avatar').html(data.image);
            }
            if (data.code === 500) {
                $('.form_login_fixed_2').html(data.viewinfo);
                $('.form_login_fixed').html(data.viewinfos);
                alert('Cập Nhật Thành Công');
            }
        },
        error: function() {

        },
    });
}
$('#add_admin').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: "{{route('add_admin')}}",
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.code === 200) {
                $('.er_name').html(data.name);
                $('.er_phone').html(data.phone);
                $('.er_email').html(data.email);
                $('.er_address').html(data.address);
                $('.er_gender').html(data.gender);
                $('.er_pass').html(data.pass);
                $('.er_repass').html(data.repass);
            }
            if (data.code === 300) {
                location.reload();
                alert('Thêm Admin Thành Công');

            }

        },
    });
});
$('.up_down').on('click', function() {
    if ($('.add_admin').hasClass('huhu') === false) {
        $('.add_admin').addClass('huhu');
        $('.add_admin').removeClass('haha');
    } else {
        $('.add_admin').addClass('haha');
        $('.add_admin').removeClass('huhu');
    }

});
$('.clo').on('click', function() {
    if ($('.add_admin').hasClass('huhu') === true) {
        $('.add_admin').addClass('haha');
        $('.add_admin').removeClass('huhu');
    }
});