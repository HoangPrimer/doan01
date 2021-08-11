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
                if (data.code === 200) {
                    alert('Bạn Không Có Quyền ! ')
                } else {
                    $('.list_admin').html(data.new_list_admin);
                    $('.total_admin').html(data.all);
                    alert('Đã Xóa');
                }
            },
        });
    }
});