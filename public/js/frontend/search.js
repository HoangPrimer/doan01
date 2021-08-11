$(document).on('change', '#sort_search_product', function() {
    let url = $(this).data('url');
    let key = $(this).val()
    let query = $('#query').val();
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        data: {
            key: key,
            keys: query
        },
        success: function(data) {
            $('.abcs').html(data.abc);
        },
    });
})

$(document).on('click', '.view-more', function(event) {
    event.preventDefault();
    let url = $('#sort_search_product').data('url');
    let key = $(this).val()
    let query = $('#query').val();
    let a = 20;
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        data: {
            num: a,
            key: key,
            keys: query
        },
        success: function(data) {
            $('.abcs').html(data.abc);
        },
    });
})