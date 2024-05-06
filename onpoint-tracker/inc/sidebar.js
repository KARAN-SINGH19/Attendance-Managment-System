var toggle_bar = document.querySelector(".nav-header");
var sidebar = document.querySelector(".sidebar");
function display_nav() {
    if (toggle_bar.firstElementChild.classList.contains("fa-bars")) {
        toggle_bar.firstElementChild.classList.replace("fa-bars", "fa-times");
    }
    else {
        toggle_bar.firstElementChild.classList.replace("fa-times", "fa-bars");
    }
    sidebar.classList.toggle("sidebaractive")
}