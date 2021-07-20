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