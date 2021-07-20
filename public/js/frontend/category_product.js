function changefillter(type, element) {
    let ul = $(element).parent('li.fillter-item').find('.sub-fillter');
    let show = $(element).parent('li.fillter-item').find('.sub-fillter').css('height');
    let numberShow = show.split('px')[0];
    let li = ul.find('li');


    if (numberShow == 0) {
        let height = $(element).parent('li.fillter-item').find('.sub-fillter').find('.list-group-item').css('height').split('px')[0];
        for (let i = 0; i <= 1; i++) {
            for (let j = 0; j <= li.length * height; j++) {
                ul.css('height', j);
            }
        }

        switch (type) {
            case 'thuonghieu':
                $('#gia').css('height', '0');
                $('#kieumay').css('height', '0');
                $('#day').css('height', '0');
                $('#size').css('height', '0');
                break;
            case 'gia':
                $('#thuonghieu').css('height', '0');
                $('#kieumay').css('height', '0');
                $('#day').css('height', '0');
                $('#size').css('height', '0');
                break;
            case 'kieumay':
                $('#thuonghieu').css('height', '0');
                $('#gia').css('height', '0');
                $('#day').css('height', '0');
                $('#size').css('height', '0');
                break;
            case 'day':
                $('#thuonghieu').css('height', '0');
                $('#gia').css('display', '0');
                $('#kieumay').css('height', '0');
                $('#size').css('height', '0');
                break;
            case 'size':
                $('#thuonghieu').css('display', '0');
                $('#gia').css('height', 'none');
                $('#kieumay').css('height', '0');
                $('#day').css('height', '0');
                break;
        }
    } else {
        $(element).parent('li.fillter-item').find('.sub-fillter').css('height', '0');

    }

}


// sap xep 
$(document).on('change', '#sort_category_product', function() {
    let key = $(this).val();
    let url = $(this).data('url');
    let id_category = $('.category_id').val();

    $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        data: {
            id: id_category,
            key: key,
        },
        success: function(data) {
            $('.category_product_list').html(data.abc);
        },
    });
});

// srearch 
$(document).on('keyup', '#search_category_product', function search_category_product() {
    let url = $(this).data('url');
    let key = $(this).val()
    let id_category = $('.category_id').val();
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        data: {
            id: id_category,
            key: key,
        },
        success: function(data) {
            if (data.code === 200) {
                $('.category_product_list').html(data.abc);
            }
        },
    });
});

////////////////////////////

$(document).ready(function() {

    $(document).on('click', '.page-link', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        let key = $('#sort_category_product').val();
        fetch_data(page, key);
    });

    function fetch_data(page, key) {
        var _token = $("input[name=_token]").val();
        let url = $('.category_id').data('url');
        let id_category = $('.category_id').val();
        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: _token,
                page: page,
                key: key,
                id: id_category,
            },
            success: function(data) {
                $('.category_product_list').html(data.abc);
            }
        });
    }

});