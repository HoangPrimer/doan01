// URL
let url_list_category = $("#url_list_category").data("url");
let url_list_trademark = $("#url_list_trademark").data("url");
let url_list_product = $("#url_list_product").data("url");

/// dropdown-btn
$(document).on("click", ".dropdown-btn", function dropdown_btn() {
    let i, j, n, m;
    let dropdown = $(".dropdown-btn");
    for (i = 0; i < dropdown.length; i++) {
        this.classList.toggle("active");
        var dropdownContent = $(this)
            .parent(".nav-item")
            .find(".dropdown-container");
        for (j = 0; j < dropdownContent.length; j++) {
            let height = $(dropdownContent[j]).css("height").split("px")[0];
            let a = $(dropdownContent[j]).find("a").length;
            if (height == 0) {
                $(dropdownContent).css({
                    opacity: "1",
                    height: a * 36 + 5 * a + 5,
                    padding: " 5px 4px 0",
                });
            } else {
                $(dropdownContent).css({
                    height: "0",
                    opacity: "0",
                    padding: "0px",
                });
            }
        }
    }
});

// // nút sắp xếp
// $(document).on('click', '.btn-sort ', function btn_sort() {

//     if ($('.menu-sort').css('display') == 'none') {
//         $('.menu-sort').css('display', 'block');
//     } else {
//         $('.menu-sort').css('display', 'none');
//     }
// });

// Thay đổi kích thước màn hình

$(".search-mobile").on("click", function() {
    if (
        $("#show_container_fluid")
        .find(".container-fluid")
        .css("height")
        .split("px")[0] == 0
    ) {
        $("#show_container_fluid").find(".container-fluid").css({
            height: "83px",
            opacity: "1",
        });
        $("#sidebarMenu").css("padding-top", "70px");
    } else {
        $("#show_container_fluid").find(".container-fluid").css({
            height: "0",
            opacity: "0",
        });
        $("#sidebarMenu").css("padding-top", "60px");
    }
});

// chi tiet san pham
$(document).on("click", ".details", function(event) {
    event.preventDefault();
    let url = $(this).data("url");
    $.ajax({
        url: url,
    }).done(function(results) {
        $(".modal-content").html(results.html);
        $("#exampleModalCenter").modal("show");
    });
});
$(document).on("click", ".close-modal", function(event) {
    event.preventDefault();
    $("#exampleModalCenter").modal("hide");
});

// link

let location_href = window.location.href;
let menuItem = $(".abc");
for (let i = 0; i < menuItem.length; i++) {
    if (menuItem[i].href === location_href) {
        $(menuItem[i])
            .parent(".dropdown-container")
            .parent(".nav-item")
            .find(".dropdown-btn")
            .css({
                "background-color": "rgb(73, 107, 200)",
                color: "#fff",
                "border-radius": "4px",
            });
        $(menuItem[i]).css({
            color: "#fff",
            "background-color": "rgb(22, 66, 124)",
            "border-radius": "4px",
        });
        $(menuItem[i])
            .parent(".dropdown-container")
            .parent(".nav-item")
            .find(".dropdown-btn")
            .addClass("active");
        let a = $(menuItem[i]).parent(".dropdown-container").find("a").length;
        $(menuItem[i])
            .parent(".dropdown-container")
            .css({
                opacity: "1",
                height: a * 36 + 5 * a + 5,
                padding: " 5px 4px 0 4px",
            });
    }
}
// thong bao
if (typeof TYPE_MESSAGE != "undefined") {
    switch (TYPE_MESSAGE) {
        case "success":
            toastr.success(MESSAGE);
            toastr.options = {
                newestOnTop: true,
                showDuration: "300",
            };
            break;
        case "error":
            toastr.error(MESSAGE);
            toastr.options = {
                newestOnTop: true,
                showDuration: "300",
            };
            break;
    }
}