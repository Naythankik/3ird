let hamburgerMenu = document.querySelector(".header-nav");
let menu = document.querySelector(".menu");
let close = document.querySelector(".close");

let hamburger = (element) => {
    if (close.hasAttribute("hidden")) {
        close.removeAttribute("hidden");
        menu.setAttribute("hidden", "");
        hamburgerMenu.style.display = "flex";
    } else {
        close.setAttribute("hidden", "");
        menu.removeAttribute("hidden");
        hamburgerMenu.style.display = "none";
    }
};