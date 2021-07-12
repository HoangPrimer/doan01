// URL
let url_list_category = $('#url_list_category').data('url');
let url_list_trademark = $('#url_list_trademark').data('url');

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

                if (data.code === 300) {
                    alert('Xóa Thành Công');
                    $('.list_category').html(data.new_list_category);
                }
            },
        });
    }

});

/* sap xep moi nhat cu nhat danh mục*/

function change_sort_category(element) {

    let tabs = document.getElementsByClassName('sort_category');
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.background = "#6c757d";
    }
    element.style.background = "#0d6efd";
    let url = $(element).data('url');

    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {

            if (data.code === 200) {

                $('.list_category').html(data.new_list_category);
            }
            if (data.code === 300) {

                $('.list_category').html(data.old_list_category);
            }
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
            if (data.code === 300) {
                $('.list_category').html(data.live_search_category);
            }
            if (data.code === 200) {
                $('.list_category').html(data.live_search_category);
            }
        },
    });
});

// an hien danh muc san pham

$(document).on('click', '.show_hide_category', function show_hide_category(event) {

    event.preventDefault();
    let url = $(this).data('url');

    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.code === 300) {
                $('.list_category').html(data.new_list_category);
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
                if (data.code === 300) {
                    alert('Xóa Thành Công');
                    $('.list_trademark').html(data.new_list_trademark);
                }
            },
        });
    }

});

/* sap xep moi nhat cu nhat thương hiệu*/

function change_sort_trademark(element) {

    let tabs = document.getElementsByClassName('sort_trademark');
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.background = "#6c757d";
    }
    element.style.background = "#0d6efd";
    let url = $(element).data('url');
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data.code === 200) {
                $('.list_trademark').html(data.new_list_trademark);
            }
            if (data.code === 300) {
                $('.list_trademark').html(data.old_list_trademark);
            }
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
            if (data.code === 300) {
                $('.list_trademark').html(data.live_search_trademark);
            }
            if (data.code === 200) {
                $('.list_trademark').html(data.live_search_trademark);
            }
        },
    });
});



/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}




$('.dandev_insert_attach').click(function() {
    if ($('.list_attach').hasClass('show-btn') === false) {
        $('.list_attach').addClass('show-btn');
    }

    var _lastimg = jQuery('.dandev_attach_view li').last().find('input[type="file"]').val();

    if (_lastimg != '') {
        var d = new Date();
        var _time = d.getTime();
        var _html = '<li id="li_files_' + _time + '" class="li_file_hide">';
        _html += '<div class="img-wrap">';
        _html += '<span class="close" onclick="DelImg(this)">x</span>';
        _html += '<div class="img-wrap-box"></div>';
        _html += '</div>';
        _html += '<div class="' + _time + '">';
        _html += '<input name="anh[]" type="file" class="hidden"  onchange="uploadImg(this)" id="files_' + _time + '" />';
        _html += '</div>';
        _html += '</li>';

        $('.dandev_attach_view').append(_html);
        $('.dandev_attach_view li').last().find('input[type="file"]').click();
    } else {
        if (_lastimg == '') {
            $('.dandev_attach_view li').last().find('input[type="file"]').click();
        } else {
            if ($('.list_attach').hasClass('show-btn') === true) {
                $('.list_attach').removeClass('show-btn');
            }
        }
    }

})


function uploadImg(el) {
    var file_data = $(el).prop('files')[0];
    var type = file_data.type;
    var fileToLoad = file_data;

    var fileReader = new FileReader();
    fileReader.onload = function(fileLoaderEvent) {
        var srcdata = fileLoaderEvent.target.result;
        var nenwImage = document.createElement('img');
        nenwImage.src = srcdata;

        var _li = $(el).closest('li');
        if (_li.hasClass('li_file_hide')) {
            _li.removeClass('li_file_hide')
        }
        _li.find('.img-wrap-box').append(nenwImage.outerHTML);
    }
    fileReader.readAsDataURL(fileToLoad);
}

function DelImg(el) {
    jQuery(el).closest('li').remove();
}


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