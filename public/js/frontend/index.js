function change__product(type, element) {
    let tabs = document.getElementsByClassName('item_btn');
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.background = "#f8f9fa";
        tabs[i].style.color = "#000";
    }

    element.style.background = "rgb(79, 179, 236)";
    element.style.color = "#fff";
    document.getElementById(type).style.display = "flex";
    switch (type) {
        case 'nam':
            document.getElementById('nu').style.display = "none";
            break;
        case 'nu':
            document.getElementById('nam').style.display = "none";
            break;
    }
}