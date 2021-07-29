// ------------------------------------------------- bình luận ----------------------------------------------- //

// sắp xếp
$(document).on('change', '.sort_list_comment', function sort_list_comment() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_comment').html(data.new_list_comment);
        },
    });
});

// tìm kiếm
$(document).on('keyup', '#live_search_comment', function live_search_comment() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_comment').html(data.new_list_comment);
        },
    });
});

// xóa 

$(document).on('click', '#delete_comment', function delete_comment(event) {

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
                $('.list_comment').html(data.new_list_comment);
                $('.total_comment').html(data.all);
                alert('Đã Xóa');
            },
        });
    }
});



// ------------------------------------------------- đánh giá ----------------------------------------------- //


// sắp xếp
$(document).on('change', '.sort_list_rate', function sort_list_rate() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_rate').html(data.new_list_rate);
        },
    });
});

// tìm kiếm
$(document).on('keyup', '#live_search_rate', function live_search_rate() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_rate').html(data.new_list_rate);
        },
    });
});

// xóa 

$(document).on('click', '#delete_rate', function delete_rate(event) {

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
                $('.list_rate').html(data.new_list_rate);
                $('.total_rate').html(data.all);
                alert('Đã Xóa');
            },
        });
    }
});



// ------------------------------------------------- người dùng ----------------------------------------------- //


// sắp xếp
$(document).on('change', '.sort_list_user', function sort_list_user() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_user').html(data.new_list_user);
        },
    });
});

// tìm kiếm
$(document).on('keyup', '#live_search_user', function live_search_user() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_user').html(data.new_list_user);
        },
    });
});

// xóa 

$(document).on('click', '#delete_user', function delete_user(event) {

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
                $('.list_user').html(data.new_list_user);
                $('.total_user').html(data.all);
                alert('Đã Xóa');
            },
        });
    }
});


// ------------------------------------------------- khách hàng ----------------------------------------------- //


// sắp xếp
$(document).on('change', '.sort_list_customer', function sort_list_customer() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_customer').html(data.new_list_customer);
        },
    });
});

// tìm kiếm
$(document).on('keyup', '#live_search_customer', function live_search_customer() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_customer').html(data.new_list_customer);
        },
    });
});

// xóa 

$(document).on('click', '#delete_customer', function delete_customer(event) {

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
                $('.list_customer').html(data.new_list_customer);
                $('.total_customer').html(data.all);
                alert('Đã Xóa');
            },
        });
    }
});