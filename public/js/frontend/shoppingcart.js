// them san pham vao gio hang

$(document).on('click', '.shopping', function addTocart(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');
    $.ajax({
        url: urlCart,
        dataType: 'json',
        success: function(data) {
            $('#header').html(data.header);
            toastr.success("Đã thêm vào giỏ!");
            toastr.options = {
                "newestOnTop": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
            }

        },
        error: function() {},
    });
});


// cap nhat gio hang 

$(document).on('click', '.cart_update', function updatecart(event) {
    event.preventDefault();

    let urlUpdate = $(this).data('url');
    let id = $(this).data('id');
    let soluong = $(this).parents('tr').find('input.soluong').val();

    $.ajax({
        url: urlUpdate,
        dataType: 'json',
        method: "GET",
        data: { id: id, soluong: soluong },
        success: function(data) {
            if (data.code === 200) {
                $('.shopping_cart').html(data.cart_component);
                toastr.info("Đã cập nhật!")

                toastr.options = {
                    "newestOnTop": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                }
            }
        },
        error: function() {

        },
    });
});


// xoa gio hang

$(document).on('click', '.del_cart', function delcart(event) {
    event.preventDefault();

    let urlDel = $(this).data('url');
    let id = $(this).data('id');


    $.ajax({
        url: urlDel,
        dataType: 'json',
        data: { id: id },
        success: function(data) {
            if (data.code === 200) {

                $('.shopping_cart').html(data.cart_component);
                $('#header').html(data.header);
                toastr.error("Đã Xóa !!!")
                toastr.options = {
                    "newestOnTop": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                }
            }
        },
        error: function() {

        },
    });
});

// dat hang 
$(document).on('submit', '#form_oder', function form_oder(event) {
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
                $('.err_email').html(data.email);
                $('.err_phone').html(data.phone);
                $('.err_payment').html(data.payment);
                $('.err_gender').html(data.gender);
                $('.err_address').html(data.address);
            }
            if (data.code === 300) {

                $('.shopping_cart').html(data.shopcart);
                $('#header').html(data.headers);

                toastr.success("Cảm ơn bạn đã đặt hàng! Chúng tôi sẽ liên hệ với bạn sớm.")

                toastr.options = {
                    "newestOnTop": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "2000",
                }
            }
        },
    });
});