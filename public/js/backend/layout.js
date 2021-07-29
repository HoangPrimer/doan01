// URL
let url_list_category = $('#url_list_category').data('url');
let url_list_trademark = $('#url_list_trademark').data('url');
let url_list_product = $('#url_list_product').data('url');

/// dropdown-btn
$(document).on('click', '.dropdown-btn', function dropdown_btn() {
    let i;
    let dropdown = $('.dropdown-btn');
    for (i = 0; i < dropdown.length; i++) {

        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }
});

// nút sắp xếp
$(document).on('click', '.btn-sort ', function btn_sort() {

    if ($('.menu-sort').css('display') == 'none') {
        $('.menu-sort').css('display', 'block');
    } else {
        $('.menu-sort').css('display', 'none');
    }
});

// Thay đổi kích thước màn hình
if ($(window).width() < 767) {

    $('.show_container_fluid').click(function show_container_fluid(event) {
        event.preventDefault();
        let container_fluid = $('#show_container_fluid').find('.container-fluid');
        if (container_fluid.css('display') === 'none') {
            container_fluid.css('display', 'flex');
            $('#sidebarMenu').css('padding-top', '150px');
        } else {
            container_fluid.css('display', 'none');
            $('#sidebarMenu').css('padding-top', '60px');

        }
    });
    $(window).on('resize', function resize() {
        if ($(window).width() < 767) {

            $('.show_container_fluid').click(function show_container_fluid(event) {
                event.preventDefault();
                let container_fluid = $('#show_container_fluid').find('.container-fluid');
                if (container_fluid.css('display') === 'none') {
                    container_fluid.css('display', 'flex');
                    $('#sidebarMenu').css('padding-top', '150px');
                } else {
                    container_fluid.css('display', 'none');
                    $('#sidebarMenu').css('padding-top', '60px');

                }
            });
        }
    });
} else {
    $('#sidebarMenu').css('padding-top', '60px');
    $(window).on('resize', function resize() {
        if ($(window).width() < 767) {

            $('.show_container_fluid').click(function show_container_fluid(event) {
                event.preventDefault();
                let container_fluid = $('#show_container_fluid').find('.container-fluid');
                if (container_fluid.css('display') === 'none') {
                    container_fluid.css('display', 'flex');
                    $('#sidebarMenu').css('padding-top', '150px');
                } else {
                    container_fluid.css('display', 'none');
                    $('#sidebarMenu').css('padding-top', '60px');

                }
            });
        }
    });
}

// remove toát 
setTimeout(function() {
    $('#toast').remove();
}, 3000);