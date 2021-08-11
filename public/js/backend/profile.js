// -------------------------------------------------- thoong tin ca nhan ------------------------------------------------- //

// hiển thị trang cập nhật thông tin
$(document).on('click', '#updateprofile', function updateprofile() {
    $('.update-profile').css({
        'top': '0',
        'bottom': '0',
        'right': '0',
        'left': '0',
        'opacity': '1',
    })
});

// đóng trang cập nhật thông tin
$(document).on('click', '.close-update', function close_update() {
    $('.update-profile').css({
        'top': '50%',
        'bottom': '50%',
        'right': '50%',
        'left': '50%',
        'opacity': '0',
    })
});


// ============================================== cập nhật thông tin ====================================  //

$(document).on('submit', '#update_profile', function update_profile(event) {

    event.preventDefault();
    let url = $(this).data('url');
    let urlhref = $('.url-profile').attr('href');

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
                $('.err_avatar').html(data.avatar);
                $('.err_name').html(data.name);
                $('.err_gender').html(data.gender);
                $('.err_phone').html(data.phone);
                $('.err_address').html(data.address);
            }
            if (data.code === 300) {
                alert('Cập nhật thành công !!!');
                $(location).attr('href', urlhref);
            }
        },
    });
});


// =============================================== thêm admin ================================== //
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