// URL
let url_list_category = $('#url_list_category').data('url');
let url_list_trademark = $('#url_list_trademark').data('url');
let url_list_product = $('#url_list_product').data('url');

/// dropdown-btn
$(document).on('click', '.dropdown-btn', function dropdown_btn() {
    let i;
    let dropdown = $('.dropdown-btn');
    for (i = 0; i < dropdown.length; i++) {

        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }
});

$(document).on('click', '.btn-sort ', function btn_sort() {

    if ($('.menu-sort').css('display') == 'none') {
        $('.menu-sort').css('display', 'block');
    } else {
        $('.menu-sort').css('display', 'none');
    }
});

/////////////////////////////////////////////////////////

if ($(window).width() < 767) {

    $('.show_container_fluid').click(function show_container_fluid(event) {
        event.preventDefault();
        let container_fluid = $('#show_container_fluid').find('.container-fluid');
        if (container_fluid.css('display') === 'none') {
            container_fluid.css('display', 'flex');
            $('#sidebarMenu').css('padding-top', '150px');
        } else {
            container_fluid.css('display', 'none');
            $('#sidebarMenu').css('padding-top', '60px');

        }
    });
    $(window).on('resize', function resize() {
        if ($(window).width() < 767) {

            $('.show_container_fluid').click(function show_container_fluid(event) {
                event.preventDefault();
                let container_fluid = $('#show_container_fluid').find('.container-fluid');
                if (container_fluid.css('display') === 'none') {
                    container_fluid.css('display', 'flex');
                    $('#sidebarMenu').css('padding-top', '150px');
                } else {
                    container_fluid.css('display', 'none');
                    $('#sidebarMenu').css('padding-top', '60px');

                }
            });
        }
    });
} else {
    $('#sidebarMenu').css('padding-top', '60px');
    $(window).on('resize', function resize() {
        if ($(window).width() < 767) {

            $('.show_container_fluid').click(function show_container_fluid(event) {
                event.preventDefault();
                let container_fluid = $('#show_container_fluid').find('.container-fluid');
                if (container_fluid.css('display') === 'none') {
                    container_fluid.css('display', 'flex');
                    $('#sidebarMenu').css('padding-top', '150px');
                } else {
                    container_fluid.css('display', 'none');
                    $('#sidebarMenu').css('padding-top', '60px');

                }
            });
        }
    });
}

//tao moi danh muc san pham

$(document).on('submit', '#create_category', function create_category(event) {

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
                $('.err_c_name').html(data.c_name);
                $('.err_c_desc').html(data.c_desc);
            }
            if (data.code === 300) {
                alert('Thêm Thành Công');
                location.reload();
            }
        },
    });
});

///cập nhật danh mục

$(document).on('submit', '#update_category', function update_category(event) {

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
                $('.err_c_name').html(data.c_name);
                $('.err_c_desc').html(data.c_desc);
            }
            if (data.code === 300) {
                alert('Cập Nhật Thành Công');
                $(location).attr('href', url_list_category);
            }
        },
    });
});

// xóa danh mục

$(document).on('click', '#delete_category', function delete_category(event) {

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
                alert('Xóa Thành Công');
                $('.list_category').html(data.new_list_category);
                $('.total_category').text(data.all);
            },
        });
    }
});

/* sap xep moi nhat cu nhat danh mục*/

function change_sort_category(element) {

    let abc = $(element).text();
    $(element).parent('.menu-sort').parent('.btn-sort').find('.text-sort').text(abc);
    let url = $(element).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('.list_category').html(data.new_list_category);
        },
    });
}

/// tim kiem truc tuyen danh mục

$(document).on('keyup', '#live_search_category', function live_seach_category() {
    var keys = $(this).val();
    var url = $(this).data('url');

    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_category').html(data.live_search_category);
        },
    });
});

// an hien danh muc san pham

$(document).on('click', '.show_hide_category', function show_hide_category(event) {

    event.preventDefault();
    let url = $(this).data('url');
    let me = $(this);
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.hide === 1) {
                $(me).text('Ẩn');
                if ($(me).hasClass('btn-danger') === true) {
                    $(me).removeClass('btn-danger');
                    $(me).addClass('btn-primary');
                } else {
                    $(me).removeClass('btn-primary');
                    $(me).addClass('btn-danger');
                }
            } else {
                $(me).text('Hiện');
                if ($(me).hasClass('btn-danger') === false) {

                    $(me).removeClass('btn-primary');
                    $(me).addClass('btn-danger')
                } else {
                    $(me).removeClass('btn-danger');
                    $(me).addClass('btn-primary');
                }
            }
        },
    });
});

//hien thi anh logo thuong hieu

$(document).on('change', '#tr_logo', function upload_logo_trademark() {

    let upload_main = $('#upload_tr_logo');
    let file = $(this).prop('files')[0];

    if (file) {
        let reader_logo = new FileReader();

        $('.label_plus').css('display', 'none');
        $('.close_logo_preview').css('display', 'block');
        $('.logo_preview').css('display', 'block');

        reader_logo.addEventListener("load", function(fileLoaderEvent) {
            var srcdata = fileLoaderEvent.target.result;
            $('.logo_preview').attr('src', srcdata);
        });
        reader_logo.readAsDataURL(file);

    }

});


$(document).on('click', '.close_logo_preview', function close_logo_preview() {
    $('.label_plus').css('display', 'block');
    $('.close_logo_preview').css('display', 'none');
    $('.logo_preview').css('display', 'none');
    $('#tr_logo').val('');
});

//tao moi thương hiệu sản phẩm

$(document).on('submit', '#create_trademark', function create_trademark(event) {

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
                $('.err_tr_name').html(data.tr_name);
                $('.err_tr_logo').html(data.tr_logo);
            }
            if (data.code === 300) {
                alert('Thêm Thành Công');
                location.reload();
            }
        },
    });
});

///cập nhật thương hiệu sản phẩm

$(document).on('submit', '#update_trademark', function update_trademark(event) {

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
                $('.err_tr_name').html(data.tr_name);
                $('.err_tr_logo').html(data.tr_logo);
            }
            if (data.code === 300) {
                alert('Cập Nhật Thành Công');
                $(location).attr('href', url_list_trademark);
            }
        },
    });
});

// xóa thương hiệu

$(document).on('click', '#delete_trademark', function delete_trademark(event) {

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
                alert('Xóa Thành Công');
                $('.list_trademark').html(data.new_list_trademark);
                $('.total_trademark').text(data.all);
            },
        });
    }
});

/* sap xep moi nhat cu nhat thương hiệu*/

function change_sort_trademark(element) {
    let abc = $(element).text();
    $(element).parent('.menu-sort').parent('.btn-sort').find('.text-sort').text(abc);
    let url = $(element).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('.list_trademark').html(data.new_list_trademark);
        },
    });
}

/// tim kiem truc tuyen thương hiệu

$(document).on('keyup', '#live_search_trademark', function live_search_trademark() {
    var keys = $(this).val();
    var url = $(this).data('url');

    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_trademark').html(data.live_search_trademark);
        },
    });
});

// upload anh san pham

$(document).on('click', '.label_pluss', function upload_pro_image() {
    let id = $(this).parent('.list_pro_image_item').find('input').attr('id');
    let file_up_load = $(this).parent('.list_pro_image_item').find('input');
    $(this).attr('for', id);
    file_up_load.on('change', function change_image_product() {
        let file = $(this).prop('files')[0];
        if (file) {
            let reader_logo = new FileReader();
            $(this).parent('.list_pro_image_item').find('.close_pro_image').css('display', 'block');
            $(this).parent('.list_pro_image_item').find('.label_pluss').css('display', 'none');
            $(this).parent('.list_pro_image_item').find('.pro_image').css('display', 'block');
            let a = $(this).parent('.list_pro_image_item').find('.pro_image');
            reader_logo.addEventListener("load", function(fileLoaderEvent) {
                let srcdata = fileLoaderEvent.target.result;
                a.attr('src', srcdata);
            });
            reader_logo.readAsDataURL(file);
        }
    });
});

$(document).on('click', '.close_pro_image', function close_pro_image() {
    $(this).parent('.list_pro_image_item').find('.label_pluss').css('display', 'block');
    $(this).parent('.list_pro_image_item').find('.close_pro_image').css('display', 'none');
    $(this).parent('.list_pro_image_item').find('.pro_image').css('display', 'none');
    $(this).parent('.list_pro_image_item').find('.pro_image').attr('src', '');
    $(this).parent('.list_pro_image_item').find('input').val('');
});

// tạo mới sản phẩm

$(document).on('submit', '#create_product', function create_product(event) {
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
                $('.err_pro_code').html(data.pro_code);
                $('.err_pro_category_id').html(data.pro_category_id);
                $('.err_pro_trademark_id').html(data.pro_trademark_id);
                $('.err_pro_source').html(data.pro_source);
                $('.err_pro_manufacturing').html(data.pro_manufacturing);
                $('.err_pro_machine_type').html(data.pro_machine_type);
                $('.err_pro_size').html(data.pro_size);
                $('.err_pro_thickness').html(data.pro_thickness);
                $('.err_pro_shell_material').html(data.pro_shell_material);
                $('.err_pro_rope_material').html(data.pro_rope_material);
                $('.err_pro_glass_material').html(data.pro_glass_material);
                $('.err_pro_waterproof').html(data.pro_waterproof);
                $('.err_pro_function').html(data.pro_function);
                $('.err_pro_guarantee').html(data.pro_guarantee);
                $('.err_pro_gender').html(data.pro_gender);
                $('.err_pro_hot').html(data.pro_hot);
                $('.err_pro_price_entry').html(data.pro_price_entry);
                $('.err_pro_price').html(data.pro_price);
                $('.err_pro_sale').html(data.pro_sale);
                $('.err_pro_amount').html(data.pro_amount);
                $('.err_pro_desc').html(data.pro_desc);
                $('.err_pro_image').html(data.pro_image);
                // $('.err_pro_image1').html(data.pro_image1);
                if (data.pro_image1 != '') {
                    $('.err_pro_image1').html('Có ảnh không đúng định dạng');
                } else {
                    $('.err_pro_image1').html('');
                }
            }
            if (data.code === 300) {
                alert('Thêm Thành Công');
                location.reload();
            }
        },
    });
});

// hiển thị ảnh cập nhật 

$(document).ready(function() {

    let a = $('.list_pro_image').find('th');
    for (let i = 0; i < a.length; i++) {
        let srcimg = $(a[i]).find('img').attr('src');
        if (srcimg != '') {
            $(a[i]).find('.pro_image').css('display', 'block');
            $(a[i]).find('.label_pluss').css('display', 'none');
            $(a[i]).find('.close_pro_image').css('display', 'block');
        }
    }
    if (a.length < 5) {
        for (let i = 1; i <= (5 - a.length); i++) {
            _html = '<th class="list_pro_image_item">'
            _html += '<i class="far fa-times-circle close_pro_image"></i>'
            _html += '<label for="" class="fa fa-plus fs-3 label_pluss"></label>'
            _html += '<input type="file" name="pro_image[]" id="pro_image_cc' + i + '" hidden />'
            _html += '<img src="" alt="" class="pro_image " />'
            _html += '</th>'

            $('.list_pro_image').append(_html);
        }
    }
});

// cập nhât  sản phẩm

$(document).on('submit', '#update_product', function update_product(event) {
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
                $('.err_pro_code').html(data.pro_code);
                $('.err_pro_category_id').html(data.pro_category_id);
                $('.err_pro_guarantee').html(data.pro_guarantee);
                $('.err_pro_price').html(data.pro_price);
                $('.err_pro_sale').html(data.pro_sale);
                $('.err_pro_amount').html(data.pro_amount);
                $('.err_pro_desc').html(data.pro_desc);
                if (data.pro_image1 != '') {
                    $('.err_pro_image1').html('Có ảnh không đúng định dạng');
                } else {
                    $('.err_pro_image1').html('');
                }
            }
            if (data.code === 300) {
                alert('Cập Nhật Thành Công');
                $(location).attr('href', url_list_product);
            }
        },
    });
});

// xoa san pham

$(document).on('click', '#delete_product', function delete_product(event) {

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
                alert('Xóa Thành Công');
                $('.list_product').html(data.new_list_product);
                $('.total_product').text(data.all);
            },
        });
    }
});


// an hien  san pham

$(document).on('click', '.show_hide_product', function show_hide_product(event) {

    event.preventDefault();
    let url = $(this).data('url');
    let me = $(this);
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.hide === 1) {
                $(me).text('Ẩn');
                if ($(me).hasClass('btn-danger') === true) {
                    $(me).removeClass('btn-danger');
                    $(me).addClass('btn-primary');
                } else {
                    $(me).removeClass('btn-primary');
                    $(me).addClass('btn-danger');
                }
            } else {
                $(me).text('Hiện');
                if ($(me).hasClass('btn-danger') === false) {

                    $(me).removeClass('btn-primary');
                    $(me).addClass('btn-danger')
                } else {
                    $(me).removeClass('btn-danger');
                    $(me).addClass('btn-primary');
                }
            }
        },
    });
});

// san pham hot

$(document).on('click', '.show_hot_product', function show_hot_product(event) {

    event.preventDefault();
    let url = $(this).data('url');
    let me = $(this);
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.hot === 1) {
                $(me).text('Không');
                if ($(me).hasClass('btn-danger') === true) {
                    $(me).removeClass('btn-danger');
                    $(me).addClass('btn-primary');
                } else {
                    $(me).removeClass('btn-primary');
                    $(me).addClass('btn-danger');
                }
            } else {
                $(me).text('Có');
                if ($(me).hasClass('btn-danger') === false) {

                    $(me).removeClass('btn-primary');
                    $(me).addClass('btn-danger')
                } else {
                    $(me).removeClass('btn-danger');
                    $(me).addClass('btn-primary');
                }
            }
        },
    });
});

// sap xep san pham 

function change_sort_product(element) {

    let abc = $(element).text();
    $(element).parent('.menu-sort').parent('.btn-sort').find('.text-sort').text(abc);
    let url = $(element).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('.list_product').html(data.new_list_product);
        },
    });
}

/// tim kiem truc tuyen san phẩm

$(document).on('keyup', '#live_search_product', function live_search_product() {
    var keys = $(this).val();
    var url = $(this).data('url');

    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_product').html(data.live_search_product);
        },
    });
});
//////////////////////////////////////////////////////////

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