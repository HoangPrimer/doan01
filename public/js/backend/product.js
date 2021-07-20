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