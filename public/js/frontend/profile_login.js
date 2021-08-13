// =============================== login ===================================  //
$(document).on('click', '.dangky', function dangky(event) {
    $('.login').css({
        'top': '0',
        'bottom': '0',
        'right': '0',
        'left': '0',
        'opacity': '1',
    });
});
$(document).on('click', '.huy', function huy(event) {
    $('.login').css({
        'top': '50%',
        'bottom': '50%',
        'right': '50%',
        'left': '50%',
        'opacity': '0',
    });
});


$(document).on('submit', '#form_register', function form_register(event) {
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

                location.reload();
                Command: toastr["success"]("Đăng Ký Thành Công!")

                toastr.options = {
                    "closeButton": false,
                    "gỡ lỗi": false,
                    "newestOnTop": false,
                    "processBar": false,
                    "positionClass": "toast-top-right",
                    "PreventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "3000",
                    "timeOut": "5000",
                    "ExtendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "tuyến tính",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        },
    });
});

// ===================================================== thông tin cá nhân ===============================  //


// hiển thị trang cập nhật thông tin
$(document).on('click', '.fa-pencil-alt', function updateprofile() {
    $('.update-profile').css({
        'top': '0',
        'bottom': '0',
        'right': '0',
        'left': '0',
        'opacity': '1',
    });

});

// đóng trang cập nhật thông tin
$(document).on('click', '.close-update', function close_update() {
    $('.update-profile').css({
        'top': '50%',
        'bottom': '50%',
        'right': '50%',
        'left': '50%',
        'opacity': '0',
    });

    $('.err_name').text('');
    $('.err_gender').text('');
    $('.err_phone').text('');
    $('.err_address').text('');
});

// cập nhật ảnh đại diện
$(document).on('change', '#avatar', function change_avatar(event) {

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
                alert(data.avatar);
            }
            if (data.code === 300) {
                location.reload();
            }
        },
    });
});

// cập nhật thông tin
$(document).on('submit', '#update_profile', function change_avatar(event) {

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
                $('.err_gender').html(data.gender);
                $('.err_phone').html(data.phone);
                $('.err_address').html(data.address);
            }
            if (data.code === 300) {
                alert('Cập nhật thành công !!!');
                location.reload();
            }
        },
    });
});