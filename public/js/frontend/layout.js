function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');

            }
        }
    }
}



// =========================== hiển thị thông tin footer

$(document).on('click', '.show_info_footer', function show_info_footer(event) {
    event.preventDefault();
    let me = $(this);
    let ul = $(this).parent('p').parent('li').find('ul.sub-menu');
    let hide = $(this).parent('p').find('.hide_info_footer');

    let li = ul.find('li');

    for (let i = 0.0000000; i <= 1; i++) {
        ul.css('  opacity', i)
        for (let j = 1; j <= li.length * 20; j++) {
            ul.css('height', j);
        }
    }
    if ($(hide).hasClass('d-none') === true) {
        $(me).addClass('d-none');
        $(hide).removeClass('d-none');
    }
});


// =========================== ẩn thông tin footer

$(document).on('click', '.hide_info_footer', function hide_info_footer() {

    let me = $(this);
    let ul = $(this).parent('p').parent('li').find('ul.sub-menu');
    let show = $(this).parent('p').find('.show_info_footer');
    for (let i = 1.0000000000; i >= 0.000000; i--) {
        ul.css('  opacity', i);
        for (let j = 80; j >= 0; j--) {
            ul.css('height', j);
        }
    }
    if ($(show).hasClass('d-none') === true) {
        $(me).addClass('d-none');
        $(show).removeClass('d-none');
    }
});

// changeaddress

function changeaddress(type, element) {
    let tabs = document.getElementsByClassName('tab-links');
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.background = "black";
    }

    element.style.background = "#3a3e44";
    document.getElementById(type).style.display = "flex";
    switch (type) {
        case 'region1':
            document.getElementById('region2').style.display = "none";
            break;
        case 'region2':
            document.getElementById('region1').style.display = "none";
            break;
    }
}