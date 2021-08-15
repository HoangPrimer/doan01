// --------------------------------------------------- đơn hàng mới ----------------------------------------------------------------//


// sap xep 
$(document).on('change', '.sort_list_order_new', function sort_list_order_new() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_order_new').html(data.new_list_order_new);
        },
    });
});


// tim kiem 
$(document).on('keyup', '#live_search_order_new', function live_search_order_new() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_order_new').html(data.new_list_order_new);
        },
    });
});


// --------------------------------------------------- đơn hàng đang giao ----------------------------------------------------------------//


// sap xep 
$(document).on('change', '.sort_list_order_onbyway', function sort_list_order_onbyway() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_order_onbyway').html(data.new_list_order_onbyway);
        },
    });
});


// tìm kiếm 
$(document).on('keyup', '#live_search_order_onbyway', function live_search_order_onbyway() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_order_onbyway').html(data.new_list_order_onbyway);
        },
    });
});


// --------------------------------------------------- đơn hàng đã giao ----------------------------------------------------------------//


//  sap xep
$(document).on('change', '.sort_list_order_done', function sort_list_order_done() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_order_done').html(data.new_list_order_done);
        },
    });
});


// tim kiem 
$(document).on('keyup', '#live_search_order_done', function live_search_order_done() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_order_done').html(data.new_list_order_done);
        },
    });
});


// --------------------------------------------------- đơn hàng đã hủy ----------------------------------------------------------------//


// sắp xếp
$(document).on('change', '.sort_list_order_cancel', function sort_list_order_cancel() {

    let key = $(this).val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        data: { key: key },
        success: function(data) {
            $('.list_order_cancel').html(data.new_list_order_cancel);
        },
    });
});


// tìm kiếm
$(document).on('keyup', '#live_search_order_cancel', function live_search_order_cancel() {

    var keys = $(this).val();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        dataType: 'JSON',
        data: {
            key: keys,
        },
        success: function(data) {
            $('.list_order_cancel').html(data.new_list_order_cancel);
        },
    });
});


// --------------------------------------------------- xóa đơn hàng ----------------------------------------------------------------//

$(document).on('click', '.delete_order', function delete_order(event) {

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
                if (data.success === 200) {
                    toastr.error("Xóa thành công");
                    toastr.options = {
                        "newestOnTop": true,
                        "showDuration": "300",
                    }
                    setTimeout(function() {
                        location.reload();
                    }, 500);

                }
            },
        });
    }
});

////////////////////////////////////////////////////////////////////

$(document).on('click', '.menu-button', function() {
    if ($(this).parent('.menu').find('.menu-action').css('display') == 'none') {
        $(this).parent('.menu').find('.menu-action').css('display', 'block');

    } else {
        $(this).parent('.menu').find('.menu-action').css('display', 'none');
    }
});

// ====================================================  //