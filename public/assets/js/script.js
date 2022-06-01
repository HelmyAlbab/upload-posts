window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var navbar = document.getElementById("navbar");
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        navbar.classList.add("shadow");
        navbar.classList.add("#e0f5ff");
        navbar.classList.remove("mt-4");
    } else {
        navbar.classList.remove("shadow");
        navbar.classList.remove("#e0f5ff");
        navbar.classList.add("mt-4");
    }
}
