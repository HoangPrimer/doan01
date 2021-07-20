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